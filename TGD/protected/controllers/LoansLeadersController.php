<?php

class LoansLeadersController extends GxController {
    
    public $displayMenu = true;

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'expression' => 'Yii::app()->user->isAdmin()',
            ),
            array('deny'),
        );
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'LoansLeaders'),
        ));
    }

    public function actionCreate() {
        $model = new LoansLeaders;

        // set title
        $this->pageTitle = " - Create Loan Sector";


        if (isset($_POST['LoansLeaders'])) {
            $model->setAttributes($_POST['LoansLeaders']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'LoansLeaders');


        if (isset($_POST['LoansLeaders'])) {
            $model->setAttributes($_POST['LoansLeaders']);

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
            $this->loadModel($id, 'LoansLeaders')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('LoansLeaders');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        // add js specific for this page
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/admin.js', CClientScript::POS_END);

        // set title
        $this->pageTitle = " - Manage Loan Sectors";

        $model = new LoansLeaders('search');
        $model->unsetAttributes();

        if (isset($_GET['LoansLeaders']))
            $model->setAttributes($_GET['LoansLeaders']);

        $columns = $this->_getTableColumns('loans_leaders');
        $this->render('admin', array(
            'model' => $model,
            'columns'=>$columns,
        ));
    }

    public function actionExcel() {
        if(isset($_GET['cols'])){
            $cols = explode('|', $_GET['cols']);
        }
        
        ExcelHelper::sendData('loans_leaders', $cols);
    }

}
