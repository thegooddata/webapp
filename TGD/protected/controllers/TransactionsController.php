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

        // set title
        $this->pageTitle = " - Create Transaction";

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
		// add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/admin.js', CClientScript::POS_END);

        // set title
        $this->pageTitle = " - Manage Transactions";

		$model = new Transactions('search');
		$model->unsetAttributes();

		if (isset($_GET['Transactions']))
			$model->setAttributes($_GET['Transactions']);

		$columns = $this->_getTableColumns('transactions');
		$this->render('admin', array(
			'model' => $model,
			'columns' => $columns,
		));
	}
    
    public function actionExcel() {
		if(isset($_GET['cols'])){
			$cols = explode('|', $_GET['cols']);
		}
		
      	ExcelHelper::sendData('transactions', $cols);
    }
    
}