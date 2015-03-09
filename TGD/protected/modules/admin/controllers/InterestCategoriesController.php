<?php

class InterestCategoriesController extends AdminModuleController
{

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id, 'InterestCategories'),
        ));
    }

    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        $model = new InterestCategories('search');
        $model->unsetAttributes();
        $model->parent_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        $parent = array();
        if($model->parent_id != 0)
            $parent = InterestCategories::model()->findByPk($model->parent_id);

        $this->render('index',array(
            'dataProvider'=>$model->search(),
            'parent' => $parent
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'InterestCategories');
        if(Yii::app()->request->isPostRequest)
        {
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));

        }

        $this->render('update',array('model'=>$model));
    }
}
