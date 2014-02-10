<?php

class ManageController extends Controller
{
	public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions
                'users'=>array('admin'),
            ),
            array('deny'),
        );
    }
    	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout='//layouts/column2';

		$this->render('index');
	}

	
}