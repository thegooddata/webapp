<?php

class ProfileController extends Controller
{
	public $defaultAction = 'profile';
	public $layout = '//layouts/blank';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

    private $statusToList = array(
        User::STATUS_APPLIED => PHPLIST_APPLIED_LIST,
        User::STATUS_PRE_ACCEPTED => PHPLIST_PRE_ACCEPTED_LIST,
        User::STATUS_ACCEPTED => PHPLIST_ACCEPTED_LIST,
        User::STATUS_DENIED => PHPLIST_DENIED_LIST,
        User::STATUS_LEFT => PHPLIST_LEFT_LIST,
        User::STATUS_EXPELLED => PHPLIST_EXPELLED_LIST,
    );

	/**
	 * Shows a particular model.
	 */
	public function actionProfile()
	{

		Yii::app()->theme = 'tgd';

        // set title
        $this->pageTitle = " - Edit profile";

        // set body id to #tgd-share-purchase
        $this->bodyId = "tgd-edit-profile";


        $profile_form = array();
        $error = '';
        $success = '';

        $user = $this->loadUser();

        if(isset($_POST['ProfileForm'])) {
            $profile_form=$_POST['ProfileForm'];

            $user->username = $profile_form['username'];
            $user->email = $profile_form['email'];
            $user->url = $profile_form['url'];
            $user->notification_preferences = !empty($profile_form['notification_preferences']) ? 1 : 0;

            if ($profile_form['current-password']!=""){

            	$identity=new UserIdentity($user->username,$profile_form['current-password']);
				$identity->authenticate();
				
				if ( $identity->errorCode == UserIdentity::ERROR_NONE)
				{

					if ($profile_form['new-password'] == $profile_form['password-confirm'])
					{
						$soucePassword = $profile_form['new-password'];

						if (preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $soucePassword))
						{
							$user->activkey=UserModule::encrypting(microtime().$soucePassword);
						    $user->password=UserModule::encrypting($soucePassword);
						}
						else
						{
							$error.="Password must be 8 to 32 characters long and include at least one letter and one number";
						    
						}
					}
					else
					{
						$error.="Passwords do not match";
					}
				}
				else
				{
					$error.="Current password is not correct";
				}

            }

            if($error=="" && $user->validate())
            {
//                $user->avatar = CUploadedFile::getInstance($user,'image');

                echo
                /* START UPLOAD FILE */
                Yii::import('ext.EUploadedImage.EUploadedImage');

                $avatar = EUploadedImage::getInstance($user, 'image');

                if(!empty($avatar)) {
                    $user->avatar = $avatar;
                    $user->avatar->maxWidth = 800;
                    $user->avatar->maxHeight = 800;

                    $user->avatar->thumb = array(
                        'maxWidth' => 150,
                        'maxHeight' => 150,
                        'dir' => 'thumb',
                        'prefix' => '',
                    );

                    $user->avatar->preview = array(
                        'maxWidth' => 400,
                        'maxHeight' => 400,
                        'dir' => 'preview',
                        'prefix' => '',
                    );
                }
                /* END UPLOAD FILE */

            	if($user->save()){
                    /* START UPLOAD FILE */
                    if (!empty($avatar)){
                        $path = Yii::app()->basePath . "/../uploads/avatars";

                        if(!is_dir($path)) mkdir($path, 0777);

                        $user->avatar->saveAs($path . "/". $user->id . "/" . $user->avatar->getName());
                    }
                    /* END UPLOAD FILE */

                    /* START PHPList */
                    $phplist = new PHPList(PHPLIST_HOST, PHPLIST_DB, PHPLIST_LOGIN, PHPLIST_PASSWORD);

                    $email = $user->email;
                    if($user->notification_preferences){
                        $list = $this->statusToList[$user->status];
                        if($list == PHPLIST_ACCEPTED_LIST){
                            $phplist->addUserToList($email, PHPLIST_ACCEPTED_LIST);
                        }
                        if($list == PHPLIST_PRE_ACCEPTED_LIST){
                            $phplist->addUserToList($email, PHPLIST_PRE_ACCEPTED_LIST);
                        }
                    }else{
                        $phplist->removeUserFromList($email, PHPLIST_ACCEPTED_LIST);
                        $phplist->removeUserFromList($email, PHPLIST_PRE_ACCEPTED_LIST);
                    }
                    /* END PHPList */
                }
            	Yii::app()->user->username = $user->username;
            	$success="Changes have been made successfully";
            	
            	
            	
            	// redirect if coming from social with a next param in the url
            	$redirect_url=Yii::app()->request->getQuery("next",null);
              if ($redirect_url !== null && !empty($redirect_url)) {
                  $redirect_url=urldecode($redirect_url);
                  $parsed_url=parse_url($redirect_url);
                  if (!in_array($parsed_url['host'], Yii::app()->params['safeRedirectHosts'])) {
                      $redirect_url=null;
                  }
              }
              
              if ($redirect_url != null) {
                $this->redirect($redirect_url);
              }
            }
            else
            {
            	foreach($user->getErrors() as $key => $value){
                    $error.="<li>".$value[0]."</li>";
                }
            }
		}
        else
        {

        }

		

	    $this->render('profile',array(
	    	'user'=>$user,
	    	'profile_form'=>$profile_form,
	    	'error'=>$error,
        	'success'=>$success,
		));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionEdit()
	{

		$model = $this->loadUser();


		$profile=$model->profile;
		
		// ajax validator
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo UActiveForm::validate(array($model,$profile));
			Yii::app()->end();
		}
		
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			
			if($model->validate()&&$profile->validate()) {
				$model->save();
				$profile->save();
				Yii::app()->user->setFlash('profileMessage',UserModule::t("Changes is saved."));
				$this->redirect(array('/user/profile'));
			} else $profile->validate();
		}


		$this->render('edit',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}
	
	/**
	 * Change password
	 */
	public function actionChangepassword() {
		$model = new UserChangePassword;
		if (Yii::app()->user->id) {
			
			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
			{
				echo UActiveForm::validate($model);
				Yii::app()->end();
			}
			
			if(isset($_POST['UserChangePassword'])) {
					$model->attributes=$_POST['UserChangePassword'];
					if($model->validate()) {
						$new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
						$new_password->password = UserModule::encrypting($model->password);
						$new_password->activkey=UserModule::encrypting(microtime().$model->password);
						$new_password->save();
						Yii::app()->user->setFlash('profileMessage',UserModule::t("New password is saved."));
						$this->redirect(array("profile"));
					}
			}
			$this->render('changepassword',array('model'=>$model));
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

	public function actionSendEmail() {

		if(Yii::app()->user->id){
			$model=Yii::app()->controller->module->user();
		
			if ($model->email != ""){
					//SEND EMAIL
		        $content = file_get_contents(Yii::app()->theme->basePath.'/emails/'.'resignation.html');

		        $url=Yii::app()->createAbsoluteUrl('/resignation?user_id='.base64_encode(Yii::app()->user->id));

		        $content = str_replace('[RESIGNATION_LINK]',$url,  $content);
		        
		        $message = new YiiMailMessage;
		        $message->subject = 'Please confirm your resignation of membership of TheGoodData';
		        $message->setBody($content,'text/html');

		        $message->addTo($model->email);
		        $message->setFrom(Yii::app()->params['marcosEmail'], Yii::app()->params['marcosEmailName']);

		        
		        Yii::app()->mail->send($message);

			}
			
		}	

        return "";
    }
}