<?php

class AchievementsController extends GxController {

	public $displayMenu = true;

	public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()
    {
        return array(
            // array('allow', // allow authenticated users to access all actions
            //     'users'=>array('admin'),
            // ),
            array('allow',  
				'expression'=>'Yii::app()->user->isAdmin()',
			),
            array('deny'),
        );

			
    }
    
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Achievements'),
		));
	}

	public function actionCreate() {
		$model = new Achievements;


		if (isset($_POST['Achievements'])) {
			$model->setAttributes($_POST['Achievements']);

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
		$model = $this->loadModel($id, 'Achievements');


		if (isset($_POST['Achievements'])) {
			$model->setAttributes($_POST['Achievements']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		//if (Yii::app()->getRequest()->getIsPostRequest()) {
			$model=$this->loadModel($id, 'Achievements');
            $model->deleted=1;
            $model->save();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		// } else
		// 	throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Achievements');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Achievements('search');
		$model->unsetAttributes();

		if (isset($_GET['Achievements']))
			$model->setAttributes($_GET['Achievements']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}