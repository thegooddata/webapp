<?php
//    * 01 * * * /usr/bin/php /var/www/tgd/protected/yiic.php interestCategories SitesCategories
//    * 03 * * * /usr/bin/php /var/www/tgd/protected/yiic.php interestCategories UsersCategoriesCache
class InterestCategoriesCommand extends CConsoleCommand
{
    public function actionSitesCategories(){

        $categories = InterestCategoriesSites::model()->findAll('status = 0');

        foreach($categories as $cat){
            $categorySite = InterestCategoriesSites::model()->findByPk($cat['id']);
            $alexa_categories = $this->alexa_categories($categorySite->site);

            $site = $categorySite->site;

            if(!empty($alexa_categories)){
                foreach($alexa_categories as $key => $alexa_category){
                    if($key > 0){
                        $categorySite = new InterestCategoriesSites;
                    }
                    $categorySite->site = $site;
                    $categorySite->category_id = 0;
                    $categorySite->status = 1;

                    $url = str_replace('Top/', '', $alexa_category);
                    $count = substr_count($url, '/');
                    for($i = 0; $i <= $count; $i++){
                        $search_category = InterestCategories::model()->findByAttributes(array('url'=> $url));
                        if($search_category){
                            if($search_category['status'] == 1){
                                $categorySitePrev = InterestCategoriesSites::model()->findByAttributes(array('site'=> $site, 'category_id' => $search_category['id']));
                                if(!$categorySitePrev){
                                    $categorySite->category_id = $search_category['id'];
                                    $categorySite->save();
                                }
                            }else{
                                InterestCategoriesSites::model()->deleteAll("site = :site", array(':site' => $site));
                                InterestCategoriesCounts::model()->deleteAll("site = :site", array(':site' => $site));
                            }
                            break;
                        }
                        $urls = explode('/', $url);
                        $url = str_replace('/'.end($urls),'', $url);

                    }
                }
            }else{
                $categorySite->category_id = 0;
                $categorySite->status = 1;
                $categorySite->save();
            }
        }
    }

    protected function alexa_categories($url){
        $urlInfo = new UrlInfo(ALEXA_ACCESS_KEY, ALEXA_SECRET_KEY, $url);
        $path = $urlInfo->getUrlInfo();
        return $path;
    }

    public function actionUsersCategoriesCache($start = 0, $finish =999){
        echo 'Start: '.$start. ' finish: '.$finish;
        $datefrom = date("Y-m-d", strtotime("-1 month"));
        $dateinto = date("Y-m-d");

        $users = InterestCategoriesCounts::model()->findAll(array(
            'select'=>'member_id',
            'condition'=>'member_id > '.$start.' and member_id < '.$finish,
            'distinct'=>true,
        ));
        if(!empty($users)){
            foreach($users as $user){
                InterestCategories::model()->setUserCategoriesCache($user->member_id, $datefrom, $dateinto);
            }
        }
    }
}