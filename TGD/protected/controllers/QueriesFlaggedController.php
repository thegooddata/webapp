<?php

class QueriesFlaggedController extends GxController {

	public $displayMenu = true;

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'QueriesFlagged'),
		));
	}

	public function actionCreate() {
		$model = new QueriesFlagged;


		if (isset($_POST['QueriesFlagged'])) {
			$model->setAttributes($_POST['QueriesFlagged']);

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
		$model = $this->loadModel($id, 'QueriesFlagged');


		if (isset($_POST['QueriesFlagged'])) {
			$model->setAttributes($_POST['QueriesFlagged']);

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
			$this->loadModel($id, 'QueriesFlagged')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		// } else
		// 	throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('QueriesFlagged');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}


	public function actionAdmin() {
		// add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/admin.js', CClientScript::POS_END);

        // set title
        $this->pageTitle = " - Manage Flagged Queries";

		$model = new QueriesFlagged('search');
		$model->unsetAttributes();

		if (isset($_GET['QueriesFlagged']))
			$model->setAttributes($_GET['QueriesFlagged']);

		$columns = $this->_getTableColumns('queries_flagged');
		$this->render('admin', array(
			'model' => $model,
			'columns' => $columns,
		));
	}
    
    public function actionExcel() {
		if(isset($_GET['cols'])){
			$cols = explode('|', $_GET['cols']);
		}
		
      	ExcelHelper::sendData('queries_flagged', $cols);
    }

}