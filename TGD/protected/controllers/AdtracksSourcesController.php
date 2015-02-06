<?php

class AdtracksSourcesController extends GxController {
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
			'model' => $this->loadModel($id, 'AdtracksSources'),
		));
	}

	public function actionCreate() {
		$model = new AdtracksSources;

        // set title
        $this->pageTitle = " - Create Webtrack Source";

		if (isset($_POST['AdtracksSources'])) {
			$model->setAttributes($_POST['AdtracksSources']);

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
		$model = $this->loadModel($id, 'AdtracksSources');


		if (isset($_POST['AdtracksSources'])) {
			$model->setAttributes($_POST['AdtracksSources']);

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
			$this->loadModel($id, 'AdtracksSources')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		// } else
		// 	throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('AdtracksSources');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new AdtracksSources('search');
		$model->unsetAttributes();

        // set title
        $this->pageTitle = " - Manage Webtrack Sources";

		if (isset($_GET['AdtracksSources']))
			$model->setAttributes($_GET['AdtracksSources']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}