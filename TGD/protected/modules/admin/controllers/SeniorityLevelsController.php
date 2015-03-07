<?php

class SeniorityLevelsController extends AdminModuleController
{

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id, 'SeniorityLevels'),
        ));
    }

    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        $model = new SeniorityLevels('search');
        $model->unsetAttributes();
        $this->render('index',array(
            'dataProvider'=>$model->search(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new SeniorityLevels;
        if(Yii::app()->request->isPostRequest)
        {
            $model->attributes=$_POST['SeniorityLevels'];
            $image = CUploadedFile::getInstance($model,'image');
            if (!empty($image)){
                $model->icon = $image;
            }
            if($model->save()){
                if (!empty($image)){
                    $path = Yii::app()->basePath . "/../uploads/seniority";

                    if(!is_dir($path)) mkdir($path, 0777);

                    $model->icon->saveAs($path . "/" . $model->icon->getName());
                }
                $this->redirect(array('view','id'=>$model->id));
            }
        }

        $this->render('create',array('model'=>$model));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'SeniorityLevels');
        if(Yii::app()->request->isPostRequest)
        {
            $model->attributes=$_POST['SeniorityLevels'];
            $image = CUploadedFile::getInstance($model,'image');
            if (!empty($image)){
                $model->icon = $image;
            }
            if($model->save()){
                if (!empty($image)){
                    $path = Yii::app()->basePath . "/../uploads/seniority";

                    if(!is_dir($path)) mkdir($path, 0777);

                    $model->icon->saveAs($path . "/" . $model->icon->getName());
                }
                $this->redirect(array('view','id'=>$model->id));
            }

        }

        $this->render('create',array('model'=>$model));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest){
            $this->loadModel($id, 'SeniorityLevels')->delete();
        }
    }

}
