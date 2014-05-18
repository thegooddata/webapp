<?php

class ResignationController extends Controller {

   public function init() {
        Yii::app()->theme = 'tgd';
        $this->layout = '//layouts/blank';
        parent::init();
    }

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionIndex() {

    	if(Yii::app()->user->id)
    	{	

    		$url=Yii::app()->createAbsoluteUrl('/resignation?user_id='.base64_encode(Yii::app()->user->id));
			Yii::app()->user->logout();
			$this->redirect($url);
    	}
    	else
    	{
	    	$user_id = base64_decode($_GET['user_id']);
	    	$user = User::model()->findByPk($user_id); 
	        $user->status = User::STATUS_LEFT;
	    	$user->save();
	    	$this->render('index');
    	}
	}

}

