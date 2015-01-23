<?php

class DefaultController extends Controller
{
	
	public $displayMenu = true;
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>array(
		        'condition'=>'status > '.User::STATUS_APPLIED,
		    ),
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));


        // set title
        $this->pageTitle = " - List Users";

		$this->render('/user/index',array(
			'dataProvider'=>$dataProvider,
		));
	}

}