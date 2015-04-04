<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
  
	private $_id;
    
    // error codes
    
	const ERROR_EMAIL_INVALID=3;
	const ERROR_STATUS_NOTACTIV=4;
	const ERROR_STATUS_BAN=5;
    const ERROR_STATUS_APPLIED=6;
    
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        // search by email or by username
		if (strpos($this->username,"@")) {
          $user=User::model()->notsafe()->find('LOWER(email)= :email', array(':email' => strtolower($this->username)));
		} else {
          $user=User::model()->notsafe()->find('LOWER(username)= :username', array(':username' => strtolower($this->username)));
		}
        
		if($user===null) {
          if (strpos($this->username,"@")) {
            $this->errorCode=self::ERROR_EMAIL_INVALID;
          } else {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
          }
		} else if (Yii::app()->getModule('user')->encrypting($this->password)!==$user->password) {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
          // do other login checks
          $this->errorCode=self::getCanLoginError($user);
		}
        
        if ((int)$this->errorCode === self::ERROR_NONE) {
          $this->_id=$user->id;
          $this->username=$user->username;
        }

		return !$this->errorCode;
	}
    
    /**
     * Does additional login check such as status. This function is used here, when logging in 
     * but also from other places to verify that a already logged in user can still login.
     * @param User $user
     * @return integer Error code
     */
    static public function getCanLoginError(&$user) {
      $errorCode=self::ERROR_NONE;
      if($user->status==0 && Yii::app()->getModule('user')->loginNotActiv==false) {
        $errorCode=self::ERROR_STATUS_NOTACTIV;
      } else if ($user->status==User::STATUS_APPLIED) {
        $errorCode=self::ERROR_STATUS_APPLIED;
      } else if (in_array($user->status, array(
                  User::STATUS_EXPELLED,
                  User::STATUS_DENIED,
                  User::STATUS_LEFT,
              ))) {
        $errorCode=self::ERROR_STATUS_BAN;
      } else {
        $errorCode=self::ERROR_NONE;
      }
      return $errorCode;
    }
    
    /**
    * @return integer the ID of the user record
    */
	public function getId()
	{
		return $this->_id;
	}
}