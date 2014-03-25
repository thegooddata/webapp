<?php

class RecoveryController extends Controller
{
	public $defaultAction = 'recovery';
	public $layout='//layouts/main';
	
	
	/**
	 * Recovery password
	 */
	public function actionRecovery () {

		$error = '';
        $success = '';
        
		// set title
		$this->pageTitle = " - Password recovery"; // TODO: translate

		// set body id to #tgd-share-purchase
		$this->bodyId = "tgd-password-recovery";

		$form = new UserRecoveryForm;
		if (Yii::app()->user->id) {
		    	$this->redirect(Yii::app()->controller->module->returnUrl);
		    } else {
				$email = ((isset($_GET['email']))?$_GET['email']:'');
				$activkey = ((isset($_GET['activkey']))?$_GET['activkey']:'');
				if ($email&&$activkey) {
					$form2 = new UserChangePassword;
		    		$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
		    		if(isset($find)&&$find->activkey==$activkey) {
			    		if(isset($_POST['UserChangePassword'])) {
							$form2->attributes=$_POST['UserChangePassword'];

							if (strlen($_POST['UserChangePassword']["password"])<8||!preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $_POST['UserChangePassword']["password"]))
		                    {
		                        $error.="Password must be 8 to 32 characters long and include at least one letter and one number ";
		                    }
		                    else if($form2->validate()) {
								$find->password = Yii::app()->controller->module->encrypting($form2->password);
								$find->activkey=Yii::app()->controller->module->encrypting(microtime().$form2->password);
								if ($find->status==0) {
									$find->status = 1;
								}
								$find->save();
								$success="New password is saved.";
								// Yii::app()->user->setFlash('recoveryMessage',UserModule::t("New password is saved."));
								// $this->redirect(Yii::app()->controller->module->recoveryUrl);
							}
							else
							{

							}
						} 
						$this->render('changepassword',array(
							'form'=>$form2,
							'error'=>$error,
                			'success'=>$success
                		));

		    		} else {
		    			Yii::app()->user->setFlash('recoveryMessage',UserModule::t("Incorrect recovery link."));
						$this->redirect(Yii::app()->controller->module->recoveryUrl);
		    		}
		    	} else {
			    	if(isset($_POST['UserRecoveryForm'])) {
			    		$form->attributes=$_POST['UserRecoveryForm'];
			    		if($form->validate()) {
			    			$user = User::model()->notsafe()->findbyPk($form->user_id);
							$activation_url = 'http://' . $_SERVER['HTTP_HOST'].$this->createUrl(implode(Yii::app()->controller->module->recoveryUrl),array("activkey" => $user->activkey, "email" => $user->email));
							
							$subject = UserModule::t("You have requested the password recovery site {site_name}",
			    					array(
			    						'{site_name}'=>Yii::app()->name,
			    					));
			    			$message = UserModule::t("You have requested the password recovery site {site_name}. To receive a new password, go to {activation_url}.",
			    					array(
			    						'{site_name}'=>Yii::app()->name,
			    						'{activation_url}'=>$activation_url,
			    					));
							
			    			UserModule::sendMail($user->email,$subject,$message);
			    			
							// Yii::app()->user->setFlash('recoveryMessage',UserModule::t("Please check your email. An instructions was sent to your email address."));

							$success="We have sent you an email with the instructions to restore your password.";
			    			$this->refresh();
			    		}
			    		else
			    		{

			    			$error="There is no account in our records with this username or email.";
			    		}

			    	}
		    		$this->render('recovery',array(
		    			'form'=>$form,
		    			'error'=>$error,
                		'success'=>$success
                	));
		    	}
		    }
	}

}