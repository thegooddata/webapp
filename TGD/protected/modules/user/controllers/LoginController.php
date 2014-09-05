<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';
	public $layout='//layouts/main';
    
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	
            $redirect_url=Yii::app()->request->getQuery("next",null);
            if ($redirect_url !== null && !empty($redirect_url)) {
                $redirect_url=urldecode($redirect_url);
                $parsed_url=parse_url($redirect_url);
                if (!in_array($parsed_url['host'], Yii::app()->params['safeRedirectHosts'])) {
                    $redirect_url=null;
                } else {
                    Yii::app()->user->returnUrl=$redirect_url;
                }
            }
	  
		if (Yii::app()->user->isGuest) {
			// add js specific for this page
        	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/early-access.js', CClientScript::POS_END);
     
			// set title
			$this->pageTitle = " - Sign in to TheGoodData"; // TODO: translate

			// set body id to #tgd-share-purchase
			$this->bodyId = "tgd-user-login";
			
			$model=new UserLogin;
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				
				
				if($model->validate()) {
					$this->lastViset();
					if (Yii::app()->user->returnUrl=='/') {
						$this->redirect(Yii::app()->createUrl('goodData/index'));
					} else {
						$this->redirect(Yii::app()->user->returnUrl);
					}
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit_at = date('Y-m-d H:i:s');
		$lastVisit->save();
	}

}
