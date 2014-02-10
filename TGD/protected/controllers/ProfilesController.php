<?php

class ProfilesController extends GxController {

	public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions
                'users'=>array('admin'),
            ),
            array('deny'),
        );
    }
    
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Profiles'),
		));
	}

	public function actionCreate() {
		$model = new Profiles;


		if (isset($_POST['Profiles'])) {
			$model->setAttributes($_POST['Profiles']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->user_id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Profiles');


		if (isset($_POST['Profiles'])) {
			$model->setAttributes($_POST['Profiles']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->user_id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Profiles')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Profiles');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Profiles('search');
		$model->unsetAttributes();

		if (isset($_GET['Profiles']))
			$model->setAttributes($_GET['Profiles']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}