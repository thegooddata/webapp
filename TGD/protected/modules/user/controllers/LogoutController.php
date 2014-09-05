<?php

class LogoutController extends Controller
{
	public $defaultAction = 'logout';
	
	/**
	 * Logout the current user and redirect to returnLogoutUrl.
	 */
	public function actionLogout()
	{
                
                $redirect_url=Yii::app()->request->getQuery("next",null);
                if ($redirect_url !== null && !empty($redirect_url)) {
                    $redirect_url=urldecode($redirect_url);
                    $parsed_url=parse_url($redirect_url);
                    if (!in_array($parsed_url['host'], Yii::app()->params['safeRedirectHosts'])) {
                        $redirect_url=null;
                    }
                }
                
                if ($redirect_url == null) {
                    $redirect_url=Yii::app()->controller->module->returnLogoutUrl;
                }
                
		Yii::app()->user->logout();
		$this->redirect($redirect_url);
	}

}