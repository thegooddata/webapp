<?php

class AdtracksController extends GxController {

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
			'model' => $this->loadModel($id, 'Adtracks'),
		));
	}

	public function actionCreate() {
		$model = new Adtracks;


		if (isset($_POST['Adtracks'])) {
			$model->setAttributes($_POST['Adtracks']);

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
		$model = $this->loadModel($id, 'Adtracks');


		if (isset($_POST['Adtracks'])) {
			$model->setAttributes($_POST['Adtracks']);

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
			$this->loadModel($id, 'Adtracks')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		// } else
		// 	throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Adtracks');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Adtracks('search');
		$model->unsetAttributes();

        // set title
        $this->pageTitle = " - Manage Webracks";

		if (isset($_GET['Adtracks']))
			$model->setAttributes($_GET['Adtracks']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

    public function actionCompare()
    {
        $file1 = file_get_contents("https://raw.github.com/disconnectme/disconnect/master/firefox/content/disconnect.safariextension/opera/chrome/data/services.json");
        $file2 = file_get_contents("https://raw.githubusercontent.com/thegooddata/extension/94d49837a68c5c9382b2c8e20b59d36c7d0d6fea/chrome/data/services.json");

        $file1 = json_decode($file1, true);
        unset($file1['license']);

        $file2 = json_decode($file2, true);
        unset($file2['license']);

        $trackers = array();

        foreach($file1['categories'] as $index => $arr) {
            foreach ($arr as $k => $value) {
                foreach ($value as $key => $val)
                    $file1['categories'][$index][$key] = $val;
                unset($file1['categories'][$index][$k]);
            }
        }

        foreach($file2['categories'] as $index => $arr) {
            foreach ($arr as $k => $value) {
                foreach ($value as $key => $val)
                    $file2['categories'][$index][$key] = $val;
                unset($file2['categories'][$index][$k]);
            }
        }

        $trackers1 = $this->arrayRecursiveDiff($file1['categories'], $file2['categories']);

        foreach($trackers1 as $index => $arr) {
            foreach ($arr as $k => $value) {
                foreach ($value as $key => $val)
                    $trackers1[$index][][$key] = array_values($val);
                unset($trackers1[$index][$k]);
            }
        }
        $trackers1 = json_encode($trackers1, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $trackers2 = $this->arrayRecursiveDiff($file2['categories'], $file1['categories']);

        foreach($trackers2 as $index => $arr) {
            foreach ($arr as $k => $value) {
                foreach ($value as $key => $val)
                    $trackers2[$index][][$key] = array_values($val);
                unset($trackers2[$index][$k]);
            }
        }
        $trackers2 = json_encode($trackers2, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $this->render('compare',array('trackers1'=>$trackers1, 'trackers2'=>$trackers2));
    }

    protected function arrayRecursiveDiff($aArray1, $aArray2) {
        $aReturn = array();

        foreach ($aArray1 as $mKey => $mValue) {
            if (isset($aArray2[$mKey])) {
                if (is_array($mValue)) {
                    $aRecursiveDiff = $this->arrayRecursiveDiff($mValue, $aArray2[$mKey]);
                    if (count($aRecursiveDiff)) { $aReturn[$mKey] = $aRecursiveDiff; }
                } else {
                    if ($mValue != $aArray2[$mKey]) {
                        $aReturn[$mKey] = $mValue;
                    }
                }
            } else {
                $aReturn[$mKey] = $mValue;
            }
        }
        return $aReturn;
    }

}