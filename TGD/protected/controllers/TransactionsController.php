<?php

class TransactionsController extends GxController {

	public $displayMenu = true;

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Transactions'),
		));
	}

	public function actionCreate() {
		$model = new Transactions;


		if (isset($_POST['Transactions'])) {
			$model->setAttributes($_POST['Transactions']);

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
		$model = $this->loadModel($id, 'Transactions');


		if (isset($_POST['Transactions'])) {
			$model->setAttributes($_POST['Transactions']);

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
			$this->loadModel($id, 'Transactions')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Transactions');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Transactions('search');
		$model->unsetAttributes();

		if (isset($_GET['Transactions']))
			$model->setAttributes($_GET['Transactions']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}