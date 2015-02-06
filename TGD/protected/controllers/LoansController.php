<?php

class LoansController extends GxController {

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
			'model' => $this->loadModel($id, 'Loans'),
		));
	}

	public function actionCreate() {
		$model = new Loans;


		if (isset($_POST['Loans'])) {
			$model->setAttributes($_POST['Loans']);

			/* START UPLOAD FILE */
			$model->image=CUploadedFile::getInstance($model,'image');
			/* END UPLOAD FILE */

			if ($model->save()) {

				/* START UPLOAD FILE */
				if ($model->image!=null){
					$model->image->saveAs(
						 Yii::app()->getBasePath()."/../uploads/".$model->loan_identifier."-".$model->image->getName()
					 );	
				}
				/* END UPLOAD FILE */

				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Loans');

		if (isset($_POST['Loans'])) {
			
			/* START UPLOAD FILE */
			$image_anterior=$model->image;
			/* END UPLOAD FILE */

			$model->setAttributes($_POST['Loans']);

			/* START UPLOAD FILE */
			$image = CUploadedFile::getInstance($model,'image');
			$image_save=false;

			if ($image == null)
			{
				$model->image=$image_anterior;
            }
            else
            {
            	$model->image=$image;
				$image_save=true;
			}
			/* END UPLOAD FILE */

			if ($model->save()) 
			{
				/* START UPLOAD FILE */
				if ($image_save)
				{
					$model->image->saveAs(
						 Yii::app()->getBasePath()."/../uploads/".$model->image->getName()
				 	);
				}
				/* END UPLOAD FILE */
					
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		// if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Loans')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		// } else
		// 	throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Loans');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Loans('search');
		$model->unsetAttributes();

		if (isset($_GET['Loans']))
			$model->setAttributes($_GET['Loans']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}