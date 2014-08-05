<?php

class BrowsingController extends GxController {

	public $displayMenu = true;

	public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()
    {
        return array(
            array('allow',  
				'expression'=>'Yii::app()->user->isAdmin()',
			),
            array('deny'),
        );
    }
    
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Browsing'),
		));
	}

	public function actionCreate() {
		$model = new Browsing;


		if (isset($_POST['Browsing'])) {
			$model->setAttributes($_POST['Browsing']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Browsing');


		if (isset($_POST['Browsing'])) {
			$model->setAttributes($_POST['Browsing']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		// if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Browsing')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		// } else
		// 	throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Browsing');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Browsing('search');
		$model->unsetAttributes();

		if (isset($_GET['Browsing']))
			$model->setAttributes($_GET['Browsing']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}