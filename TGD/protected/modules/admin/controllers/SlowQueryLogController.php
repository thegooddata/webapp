<?php

class SlowQueryLogController extends AdminModuleController
{

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id, 'SlowQueryLog'),
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SlowQueryLog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SlowQueryLog']))
			$model->attributes=$_GET['SlowQueryLog'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
    
    public function actionTruncate() {
      $command=Yii::app()->db->createCommand();
      $command->truncateTable('{{slow_query_log}}');
      $this->redirect(array('admin'));
    }

}
