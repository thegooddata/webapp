<?php

class ProfilesFieldsController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'ProfilesFields'),
		));
	}

	public function actionCreate() {
		$model = new ProfilesFields;


		if (isset($_POST['ProfilesFields'])) {
			$model->setAttributes($_POST['ProfilesFields']);

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
		$model = $this->loadModel($id, 'ProfilesFields');


		if (isset($_POST['ProfilesFields'])) {
			$model->setAttributes($_POST['ProfilesFields']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'ProfilesFields')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('ProfilesFields');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new ProfilesFields('search');
		$model->unsetAttributes();

		if (isset($_GET['ProfilesFields']))
			$model->setAttributes($_GET['ProfilesFields']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}