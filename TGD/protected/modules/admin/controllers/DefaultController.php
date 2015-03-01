<?php

class DefaultController extends AdminModuleController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}