<?php

class MembersPiiController extends GxController {

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
			'model' => $this->loadModel($id, 'MembersPii'),
		));
	}

	public function actionCreate() {
		$model = new MembersPii;


		if (isset($_POST['MembersPii'])) {
			$model->setAttributes($_POST['MembersPii']);

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
		$model = $this->loadModel($id, 'MembersPii');


		if (isset($_POST['MembersPii'])) {
			$model->setAttributes($_POST['MembersPii']);

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
			$this->loadModel($id, 'MembersPii')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		// } else
		// 	throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('MembersPii');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new MembersPii('search');
		$model->unsetAttributes();

		if (isset($_GET['MembersPii']))
			$model->setAttributes($_GET['MembersPii']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
    
    public function actionExcel() {
      
      $data=Yii::app()->db->createCommand("SELECT * FROM {{members_pii}}")->queryAll();
      
      // filename for download
      $filename = "members_pii_" . date('Ymd') . ".xls";

      header("Content-Disposition: attachment; filename=\"$filename\"");
      header("Content-Type: text/csv; charset=UTF-16LE");

      $flag = false;
      foreach($data as $row) {
        if(!$flag) {
          // display field/column names as first row
          echo implode("\t", array_keys($row)) . "\r\n";
          $flag = true;
        }
        foreach ($row as $k => $v) {
          ExcelHelper::cleanData($v);
          $row[$k]=$v;
        }
        echo implode("\t", array_values($row)) . "\r\n";
      }
      Yii::app()->end();
      
    }

}