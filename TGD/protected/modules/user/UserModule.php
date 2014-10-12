<?php
/**
 * Yii-User module
 * 
 * @author Mikhail Mangushev <mishamx@gmail.com> 
 * @link http://yii-user.2mx.org/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @version $Id: UserModule.php 132 2011-10-30 10:45:01Z mishamx $
 */

class UserModule extends CWebModule
{
	/**
	 * @var string
	 * @desc salt for encrypt pass
	 */
	public $salt = '';

	/**
	 * @var int
	 * @desc items on page
	 */
	public $user_page_size = 10;
	
	/**
	 * @var int
	 * @desc items on page
	 */
	public $fields_page_size = 10;
	
	/**
	 * @var string
	 * @desc hash method (md5,sha1 or algo hash function http://www.php.net/manual/en/function.hash.php)
	 */
	public $hash='md5';
	
	/**
	 * @var boolean
	 * @desc use email for activation user account
	 */
	public $sendActivationMail=true;
	
	/**
	 * @var boolean
	 * @desc allow auth for is not active user
	 */
	public $loginNotActiv=false;
	
	/**
	 * @var boolean
	 * @desc activate user on registration (only $sendActivationMail = false)
	 */
	public $activeAfterRegister=false;
	
	/**
	 * @var boolean
	 * @desc login after registration (need loginNotActiv or activeAfterRegister = true)
	 */
	public $autoLogin=true;
	
	public $registrationUrl = array("/user/registration");
	public $recoveryUrl = array("/user/recovery/recovery");
	public $loginUrl = array("/user/login");
	public $logoutUrl = array("/user/logout");
	public $profileUrl = array("/user/profile");
	public $returnUrl = array("/user/profile");
	public $returnLogoutUrl = array("/user/login");
	
	
	/**
	 * @var int
	 * @desc Remember Me Time (seconds), defalt = 2592000 (30 days)
	 */
	public $rememberMeTime = 2592000; // 30 days
	
	public $fieldsMessage = '';
	
	/**
	 * @var array
	 * @desc User model relation from other models
	 * @see http://www.yiiframework.com/doc/guide/database.arr
	 */
	public $relations = array();
	
	/**
	 * @var array
	 * @desc Profile model relation from other models
	 */
	public $profileRelations = array();
	
	/**
	 * @var boolean
	 */
	public $captcha = array('registration'=>false);
	
	/**
	 * @var boolean
	 */
	//public $cacheEnable = false;
	
	public $tableUsers = '{{members}}';
	public $tableProfiles = '{{profiles}}';
	public $tableProfileFields = '{{profiles_fields}}';

    public $defaultScope = array(
            'with'=>array('profile'),
    );
    
    public $rejectReasons=array(
        'incomplete'=>'Incomplete/wrong personal details',
        'not_used'=>'Have not used TheGoodData service prior applying for Membership',
        'previous_expulsion'=>'Previous expulsion',
        'other'=>'Other reason (specify)',
    );
	
	static private $_user;
	static private $_users=array();
	static private $_userByName=array();
	static private $_admin;
	static private $_admins;
	
	/**
	 * @var array
	 * @desc Behaviors for models
	 */
	public $componentBehaviors=array();
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'user.models.*',
			'user.components.*',
		));
	}
	
	public function getBehaviorsFor($componentName){
        if (isset($this->componentBehaviors[$componentName])) {
            return $this->componentBehaviors[$componentName];
        } else {
            return array();
        }
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	/**
	 * @param $str
	 * @param $params
	 * @param $dic
	 * @return string
	 */
	public static function t($str='',$params=array(),$dic='user') {
		if (Yii::t("UserModule", $str)==$str)
		    return Yii::t("UserModule.".$dic, $str, $params);
        else
            return Yii::t("UserModule", $str, $params);
	}
	
	/**
	 * @return hash string.
	 */
	public static function encrypting($string="") {
		$hash = Yii::app()->getModule('user')->hash;
		if ($hash=="md5")
			return md5(Yii::app()->getModule('user')->salt.$string);
		if ($hash=="sha1")
			return sha1($string);
		else
			return hash($hash,$string);
	}
	
	/**
	 * @param $place
	 * @return boolean 
	 */
	public static function doCaptcha($place = '') {
		if(!extension_loaded('gd'))
			return false;
		if (in_array($place, Yii::app()->getModule('user')->captcha))
			return Yii::app()->getModule('user')->captcha[$place];
		return false;
	}
	
	/**
	 * Return admin status.
	 * @return boolean
	 */
	public static function isAdmin() {
		if(Yii::app()->user->isGuest)
			return false;
		else {
			if (!isset(self::$_admin)) {
				if(self::user()->superuser)
					self::$_admin = true;
				else
					self::$_admin = false;	
			}
			return self::$_admin;
		}
	}

	/**
	 * Return admins.
	 * @return array syperusers names
	 */	
	public static function getAdmins() {
		if (!self::$_admins) {
			$admins = User::model()->active()->superuser()->findAll();
			$return_name = array();
			foreach ($admins as $admin)
				array_push($return_name,$admin->username);
			self::$_admins = ($return_name)?$return_name:array('');
		}
		return self::$_admins;
	}
	
	/**
	 * Send to user mail
	 */
	public static function sendMail($email,$subject,$body) {
    	// $adminEmail = Yii::app()->params['adminEmail'];
	    // $headers = "MIME-Version: 1.0\r\nFrom: $adminEmail\r\nReply-To: $adminEmail\r\nContent-Type: text/html; charset=utf-8";
	    // $message = wordwrap($message, 70);
	    // $message = str_replace("\n.", "\n..", $message);
	    // return mail($email,'=?UTF-8?B?'.base64_encode($subject).'?=',$message,$headers);

	    $message = new YiiMailMessage;
	    $message->subject = $subject;
	    $message->setBody($body,'text/html');
	    $message->addTo($email);
	    $message->from = Yii::app()->params['senderGenericEmail'];
	    Yii::app()->mail->send($message);
	}

    /**
     * Send to user mail
     */
    public function sendMailToUser($user_id,$subject,$message,$from='') {
        $user = User::model()->findbyPk($user_id);
        if (!$from) $from = Yii::app()->params['adminEmail'];
        $headers="From: ".$from."\r\nReply-To: ".Yii::app()->params['adminEmail'];
        return mail($user->email,'=?UTF-8?B?'.base64_encode($subject).'?=',$message,$headers);
    }
	
	/**
	 * Return safe user data.
	 * @param user id not required
	 * @return user object or false
	 */
	public static function user($id=0,$clearCache=false) {
        if (!$id&&!Yii::app()->user->isGuest)
            $id = Yii::app()->user->id;
		if ($id) {
            if (!isset(self::$_users[$id])||$clearCache)
                self::$_users[$id] = User::model()->with(array('profile'))->findbyPk($id);
			return self::$_users[$id];
        } else return false;
	}
	
	/**
	 * Return safe user data.
	 * @param user name
	 * @return user object or false
	 */
	public static function getUserByName($username) {
		if (!isset(self::$_userByName[$username])) {
			$_userByName[$username] = User::model()->findByAttributes(array('username'=>$username));
		}
		return $_userByName[$username];
	}
	
	/**
	 * Return safe user data.
	 * @param user id not required
	 * @return user object or false
	 */
	public function users() {
		return User;
	}


	public static function createUser($email,$username,$password,$verifyPassword){
		
		$model = new RegistrationForm;
  		$profile=new Profile;

		$model->email=$email;
		$model->username=$username;
		$model->password=$password;
		$model->verifyPassword=$verifyPassword;

		$profile->attributes=array();
		
		if($model->validate()&&$profile->validate())
		{
		    $soucePassword = $model->password;
		    $model->activkey=UserModule::encrypting(microtime().$model->password);
		    $model->password=UserModule::encrypting($model->password);
		    $model->verifyPassword=UserModule::encrypting($model->verifyPassword);
		    $model->superuser=0;
		    $model->status=User::STATUS_APPLIED; //User::STATUS_NOACTIVE

		    if ($model->save()) {
		        $profile->user_id=$model->id;
		        $profile->save();
		        
		        return $model;

		        /*
		        if (Yii::app()->controller->module->sendActivationMail) {
		            $activation_url = $this->createAbsoluteUrl('/user/activation/activation',array("activkey" => $model->activkey, "email" => $model->email));
		            UserModule::sendMail($model->email,UserModule::t("You registered from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Please activate you account go to {activation_url}",array('{activation_url}'=>$activation_url)));
		        }

		        if ((Yii::app()->controller->module->loginNotActiv||(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false))&&Yii::app()->controller->module->autoLogin) {
		                $identity=new UserIdentity($model->username,$soucePassword);
		                $identity->authenticate();
		                Yii::app()->user->login($identity,0);
		                $this->redirect(Yii::app()->controller->module->returnUrl);
		        } else {
		            if (!Yii::app()->controller->module->activeAfterRegister&&!Yii::app()->controller->module->sendActivationMail) {
		                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Contact Admin to activate your account."));
		            } elseif(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false) {
		                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please {{login}}.",array('{{login}}'=>CHtml::link(UserModule::t('Login'),Yii::app()->controller->module->loginUrl))));
		            } elseif(Yii::app()->controller->module->loginNotActiv) {
		                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email or login."));
		            } else {
		                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email."));
		            }
		            $this->refresh();
		        }
		        */
		    }
		} 
		else 
			$profile->validate();

		return $model->getErrors();

		// $model = new RegistrationForm;
  //       $profile=new Profile;

	 //    $model->username=$username;
	 //    $model->password=$password;
	 //    $model->verifyPassword=$verifyPassword;
	 //    $model->email=$email;
	    
  //       $profile->attributes=array();

  //       if($model->validate()&&$profile->validate())
  //       {

  //           $soucePassword = $model->password;
  //           $model->activkey=UserModule::encrypting(microtime().$model->password);
  //           $model->password=UserModule::encrypting($model->password);
  //           $model->verifyPassword=UserModule::encrypting($model->verifyPassword);
		// 	$model->superuser=0;
		// 	$model->status=User::STATUS_NOACTIVE;
			
		// 	if ($model->save()) {
		// 		$profile->user_id=$model->id;
				
		// 		if ($profile->save()) {
		// 			var_dump($model->getErrors());
  //       			die;
		// 		}

		// 		return $model;
  //       	}
  //       	else{
  //       		var_dump($model->getErrors());
  //       		die;
  //       	}
  //       } 
  //       else{ 
  //       	$profile->validate();
  //       	var_dump($model->getErrors());
  //   		die;
  //       }

  //       return null;
	}
    
    /**
     * Sends new member email to admin.
     * @param MembersPii $pii
     * @param User $member
     * @return bool Email sent or not.
     */
    public function sendNewMemberEmail($pii, $member) {
      // SEND EMAIL
      $content = file_get_contents(Yii::app()->theme->basePath.'/emails/'.'notification.html');
      $bd = new DateTime($pii->yearbirthday.'/'.$pii->monthbirthday.'/'.$pii->daybirthday);
      $now = new DateTime();
      $age = $bd->diff($now)->y;

      $content = str_replace('[NAME]',$pii->firstname,      $content);
      $content = str_replace('[SURNAME]',$pii->lastname, $content);
      $content = str_replace('[STREET]',$pii->streetname, $content);
      $content = str_replace('[STREET_DETAILS]',$pii->streetdetails, $content);
      $content = str_replace('[CITY]',$pii->city, $content);
      $content = str_replace('[STATE]',$pii->statecounty, $content);
      $content = str_replace('[ZIP]',$pii->postcode, $content);
      $content = str_replace('[COUNTRY]',$pii->country, $content);
      $content = str_replace('[BIRTH_DATE]', $bd->format('Y-m-d'), $content);
      $content = str_replace('[AGE]', $age, $content);
      
      $approveLink=Yii::app()->controller->createAbsoluteUrl('/user/admin/approveApplication',array('id'=>$member->id));
      $content = str_replace('[LINK_ACCEPT]', $approveLink, $content);
      
      $reject_links=array();
      foreach ($this->rejectReasons as $k=>$v) {
        $reject_links[]='<li><a href="'.Yii::app()->controller->createAbsoluteUrl('/user/admin/rejectApplication',array('id'=>$member->id,'reason'=>$k)).'">'.$v.'</a></li>';
      }
      $content = str_replace('[REJECT_LINKS]', implode('', $reject_links), $content);

      $subject = '[NAME] [SURNAME] has applied for Membership';
      $subject = str_replace('[NAME]',$pii->firstname,  $subject);
      $subject = str_replace('[SURNAME]',$pii->lastname, $subject);

      $message = new YiiMailMessage;
      $message->subject = $subject;
      $message->setBody($content,'text/html');
      $message->setTo(array(Yii::app()->params['adminEmail']));
      //$message->addTo(Yii::app()->params['adminEmail']);
      $message->setFrom(array(Yii::app()->params['senderGenericEmail'] => Yii::app()->params['senderGenericEmailName']));
      return Yii::app()->mail->send($message);
    }
    
    /**
     * Sends the approved application email to a member
     * @param User $model
     * @return bool
     */
    public function sendApplicationApproval($model) {
      
      $firstname=null;
      
      $memberObj = Yii::app()->db->createCommand()
      ->setFetchMode(PDO::FETCH_OBJ)
      ->select('*')
      ->from('tbl_members_pii u')
      ->where(array(
                  'and',
                  'u.member_id = :user_id',
                  ),
          array(
                  ':user_id'=>$model->id
                  )
          )
      ->queryAll();
      
      if (isset($memberObj[0])) {
        $memberObj = $memberObj[0];
        $firstname=$memberObj->firstname;
      }
      


      //SEND EMAIL
      $content = file_get_contents(Yii::app()->theme->basePath.'/emails/'.'application_approval.html');

      $content = str_replace('[FIRST_NAME]', $firstname,  $content);

      $content = str_replace('[SHARE_URL]',Yii::app()->controller->createAbsoluteUrl('/purchase/index'),  $content);

      $message = new YiiMailMessage;
      $message->subject = 'Your Membership application has been approved';
      $message->setBody($content,'text/html');
      $message->addTo($model->email);
      $message->setFrom(Yii::app()->params['marcosEmail'], Yii::app()->params['marcosEmailName']);
      return Yii::app()->mail->send($message);
    }
    
    public function getRejectReasons() {
      return $this->rejectReasons;
    }
}
