<?php

class AdtracksTypesController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'AdtracksTypes'),
		));
	}

	public function actionCreate() {
		$model = new AdtracksTypes;


		if (isset($_POST['AdtracksTypes'])) {
			$model->setAttributes($_POST['AdtracksTypes']);

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
		$model = $this->loadModel($id, 'AdtracksTypes');


		if (isset($_POST['AdtracksTypes'])) {
			$model->setAttributes($_POST['AdtracksTypes']);

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
			$this->loadModel($id, 'AdtracksTypes')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('AdtracksTypes');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new AdtracksTypes('search');
		$model->unsetAttributes();

		if (isset($_GET['AdtracksTypes']))
			$model->setAttributes($_GET['AdtracksTypes']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}