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
                        $search_category = InterestCategories::model()->findByAttributes(array('url'=> $url, 'status'=> 1));
                        if($search_category){
                            $categorySitePrev = InterestCategoriesSites::model()->findByAttributes(array('site'=> $site, 'category_id' => $search_category['id']));
                            if(!$categorySitePrev){
                                $categorySite->category_id = $search_category['id'];
                                $categorySite->save();
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
        $xml = simplexml_load_file("http://data.alexa.com/data?cli=10&url=".$url);
        $categories = array();
        if(isset($xml->DMOZ->SITE->CATS->CAT)) {
            foreach($xml->DMOZ->SITE->CATS->CAT as $cat){
                $categories[] = current($cat->attributes()->ID);
            }
        }
        return $categories;
    }

    public function actionUsersCategoriesCache(){

        $datefrom = date("Y-m-d", strtotime("-1 month"));
        $dateinto = date("Y-m-d");

        $users = InterestCategoriesCounts::model()->findAll(array(
            'select'=>'member_id',
            'condition'=>'member_id > 0',
            'distinct'=>true,
        ));
        if(!empty($users)){
            foreach($users as $user){
                InterestCategories::model()->setUserCategoriesCache($user->member_id, $datefrom, $dateinto);
            }
        }
    }
}