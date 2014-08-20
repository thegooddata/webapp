<?php

class ResignationController extends Controller
{
	public $defaultAction = 'show';
	public $layout = '//layouts/blank';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	public function actionShow()
	{
		// set theme
		Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Membership resignation";

        // set body id to #tgd-edit-profile
        $this->bodyId = "tgd-resignation";

        $resignation_form = array();
        $error = '';
        $success = '';

		$user = $this->loadUser();
        if(isset($_POST['ResignationForm'])) {
            $resignation_form=$_POST['ResignationForm'];
 
            if ($resignation_form['password']!=""){

            	$identity=new UserIdentity($user->username,$resignation_form['password']);
				$identity->authenticate();
				
				if ( $identity->errorCode == UserIdentity::ERROR_NONE)
				{
					$success.="Resignation successful";
					if(empty($error))
					{
						// TODO: update user status
						$user = User::model()->findByPk($user->id); 
				        $user->status = User::STATUS_LEFT;
				        $user->save();
				        $this->sendEmail();
						Yii::app()->user->logout();

						$this->redirect('/resignation/thanks');
					}
				}
				else
				{
					$error.="Given password is not correct";
				}

            }
            else
            {
            	$error.="Password can't be empty";
            }

            if($error!="")
            {
            	foreach($user->getErrors() as $key => $value){
                    $error.="<li>".$value[0]."</li>";
                }
            }
		}



	    $this->render('show',array(
	    	'user'=>$user,
	    	'profile_form'=>$resignation_form,
	    	'error'=>$error,
        	'success'=>$success,
		));
	}

	public function actionThanks()
	{
		if(Yii::app()->user->id)
    	{	
			$this->redirect('/user/resignation');
    	}
    	else
    	{
	    	//$user_id = base64_decode($_GET['user_id']);
	    	//$user = User::model()->findByPk($user_id); 
	       // $user->status = User::STATUS_LEFT;
	    	//$user->save();
	    	$this->render('thanks');
    	}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser()
	{
		if($this->_model===null)
		{
			if(Yii::app()->user->id){
				$this->_model=Yii::app()->controller->module->user();
			}
			
			if($this->_model===null){
				$this->redirect(Yii::app()->controller->module->loginUrl);
			}
		}

		// var_dump($this->_model);die;
		return $this->_model;
	}

	public function sendEmail() {
		if(Yii::app()->user->id){
			$model=Yii::app()->controller->module->user();
			if ($model->email != ""){
				//SEND EMAIL
				$content = file_get_contents(Yii::app()->theme->basePath.'/emails/'.'resignation.html');
				$content = str_replace('[USERNAME]',$model->username);
				$message = new YiiMailMessage;
				$message->subject = 'Resignation of Membership of TheGoodData Confirmed';
				$message->setBody($content,'text/html');
				$message->addTo($model->email);
				$message->setFrom(Yii::app()->params['marcosEmail'], Yii::app()->params['marcosEmailName']);
				Yii::app()->mail->send($message);
			}
		}	
		return "";
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}