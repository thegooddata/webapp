<?php

class CacheController extends AdminModuleController
{

	public function actionIndex()
	{
		$this->render('index');
	}
    
    public function actionTruncate() {
      $command=Yii::app()->db->createCommand();
      $command->truncateTable(strtolower(Yii::app()->cache->cacheTableName));
      $this->redirect(array('index'));
    }

}
