<?php

class LoansCountriesController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'LoansCountries'),
		));
	}

	public function actionCreate() {
		$model = new LoansCountries;


		if (isset($_POST['LoansCountries'])) {
			$model->setAttributes($_POST['LoansCountries']);

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
		$model = $this->loadModel($id, 'LoansCountries');


		if (isset($_POST['LoansCountries'])) {
			$model->setAttributes($_POST['LoansCountries']);

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
			$this->loadModel($id, 'LoansCountries')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('LoansCountries');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new LoansCountries('search');
		$model->unsetAttributes();

		if (isset($_GET['LoansCountries']))
			$model->setAttributes($_GET['LoansCountries']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}