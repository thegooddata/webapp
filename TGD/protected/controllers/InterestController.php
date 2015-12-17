<?php

class InterestController extends Controller {

        // set title
    public $pageTitle = " - Interests";

    public $bodyId = 'tgd-interest';
    
    public $displayMenu = true;

    public function filters() {
        return array('accessControl'); // perform access control for CRUD operations
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated users to access all actions
                'users' => array('@'),
            ),
            array('deny'),
        );
    }

    public function actionIndex() {
        // set layout
        $this->layout = '//layouts/column1';

        $member_id = Yii::app()->user->id;

        $datefrom = date("Y-m-d", strtotime("-1 month"));
        $dateinto = date("Y-m-d");

        $model = new InterestCategories;

        $categories = $model->getUserCategoriesCache($member_id, $dateinto);
        if(empty($categories) && $model->checkCategoriesRating($member_id, $datefrom, $dateinto)){
            if($model->setUserCategoriesCache($member_id, $datefrom, $dateinto))
                $categories = $model->getUserCategoriesCache($member_id, $dateinto);
        }

        $this->pageTitle = " - Interests";

        $this->render('index', array(
                'categories' => $categories,
            )
        );
    }

    public function actionRating() {

        if(Yii::app()->request->isPostRequest) {
            $id = $_POST['id'];
            $member_id = Yii::app()->user->id;

            $datefrom = date("Y-m-d", strtotime("-1 month"));
            $dateinto = date("Y-m-d");

            $model = new InterestCategories;

            $categories = $model->getCategoriesRating($id, $member_id, $datefrom, $dateinto);

            $parent_id = 0;
            $categoryData = $model->findByPk($id);
            if (!empty($categoryData)) {
                $parent_id = $categoryData->parent_id;
            }
            $parentsCategories = $model->getParentCategories($id);
            $breadcrumbs = array_reverse($parentsCategories);

            $this->pageTitle = " - Interests";

            echo $this->renderPartial('rating', array(
                    'categories' => $categories,
                    'parent_id' => $parent_id,
                    'breadcrumbs' => $breadcrumbs,
                )
            );
        }
    }

    public function actionDeleteAll(){
        $member_id = Yii::app()->user->id;

        InterestCategoriesCounts::model()->deleteAll('member_id = :member_id', array(':member_id' => $member_id));

        Yii::app()->db->createCommand()->update(
            'tbl_usage_data_domain',
            array('member_id'=>-1),
            'member_id = :param',
            array(':param'=>$member_id)
        );

        Yii::app()->db->createCommand()->update(
            'tbl_usage_data_daily',
            array('member_id'=>-1),
            'member_id = :param',
            array(':param'=>$member_id)
        );

        Browsing::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));
        Queries::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));
        Adtracks::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));

        InterestCategories::model()->deleteUserCategoriesCache($member_id);


        $this->redirect('index');
    }

}
