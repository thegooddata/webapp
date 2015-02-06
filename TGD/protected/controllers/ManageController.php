<?php

class ManageController extends Controller
{
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
    	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout='//layouts/column2';


        // set title
        $this->pageTitle = " - Manage";


		$this->render('index');
	}

	
}