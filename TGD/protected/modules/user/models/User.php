<?php

class User extends CActiveRecord
{	
	const REGEX_SPECIAL_CHARS = '';
	
	const STATUS_APPLIED = -1;
	const STATUS_EXPELLED = -2;
	const STATUS_DENIED = -3;
	const STATUS_LEFT = -4;

	const STATUS_PRE_ACCEPTED = 1;
	const STATUS_ACCEPT = 2;

	//TODO: Delete for next version (backward compatibility)
	//const STATUS_BANED=-1;
	
	/**
	 * The followings are the available columns in table 'users':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $email
	 * @var string $activkey
	 * @var integer $createtime
	 * @var integer $lastvisit
	 * @var integer $superuser
	 * @var integer $status
     * @var timestamp $created_at
     * @var timestamp $lastvisit_at
     * @var key $key
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->getModule('user')->tableUsers;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		
		$regularExpressionPattern = '/.*(?=.*\d)(?=.*[a-zA-Z])(?=.*['.(self::REGEX_SPECIAL_CHARS).']).*/';

		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.CConsoleApplication
		return ((get_class(Yii::app())=='CConsoleApplication' || (get_class(Yii::app())!='CConsoleApplication' && Yii::app()->getModule('user')->isAdmin()))?array(
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Incorrect username (length between 3 and 20 characters).")),
			array('password', 'length', 'max'=>128, 'min' => 8,'message' => UserModule::t("Incorrect password (minimal length 4 symbols).")),

			//array('key', 'notsafe'),

        	// array('password', 'match', 'pattern'=>$regularExpressionPattern, 'skipOnError'=>true, 'message'=>'Must have at least one letter, number and one special character out of set ['.self::REGEX_SPECIAL_CHARS.']!'),

			array('email', 'email'),
			array('username', 'unique', 'message' => UserModule::t("This user's name already exists.")),
			array('email', 'unique', 'message' => UserModule::t("This user's email address already exists.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Incorrect symbols (A-z0-9).")),
			array('status', 'in', 'range'=>
				array(
					self::STATUS_APPLIED,
					self::STATUS_EXPELLED,
					self::STATUS_DENIED,
					self::STATUS_LEFT,
					self::STATUS_PRE_ACCEPTED,
					self::STATUS_ACCEPT,
				)
			),
			array('superuser', 'in', 'range'=>array(0,1)),
            array('created_at', 'default', 'value' => date('Y-m-d H:i:s'), 'setOnEmpty' => true, 'on' => 'insert'),
            array('lastvisit_at', 'default', 'value' => '0000-00-00 00:00:00', 'setOnEmpty' => true, 'on' => 'insert'),
			//array('username, email, superuser, status', 'required'),
			array('username,  superuser, status', 'required'),
			array('superuser, status', 'numerical', 'integerOnly'=>true),
			array('id, username, password, email, activkey, created_at, lastvisit_at, superuser, status', 'safe', 'on'=>'search'),
		):((Yii::app()->user->id==$this->id)?array(
			//array('username, email', 'required'),
			array('username', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Incorrect username (length between 3 and 20 characters).")),
			//array('email', 'email'),
			array('username', 'unique', 'message' => UserModule::t("This user's name already exists.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Incorrect symbols (A-z0-9).")),
			//array('email', 'unique', 'message' => UserModule::t("This user's email address already exists.")),
		):array()));
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        $relations = Yii::app()->getModule('user')->relations;
        if (!isset($relations['profile']))
            $relations['profile'] = array(self::HAS_ONE, 'Profile', 'user_id');
        return $relations;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => UserModule::t("Id"),
			'username'=>UserModule::t("username"),
			'password'=>UserModule::t("password"),
			'verifyPassword'=>UserModule::t("Retype Password"),
			'email'=>UserModule::t("E-mail"),
			//'verifyCode'=>UserModule::t("Verification Code"),
			'activkey' => UserModule::t("activation key"),
			'createtime' => UserModule::t("Registration date"),
			'created_at' => UserModule::t("Registration date"),
			
			'lastvisit_at' => UserModule::t("Last visit"),
			'superuser' => UserModule::t("Superuser"),
			'status' => UserModule::t("Status"),
			'key' => UserModule::t("Key"),
		);
	}
	
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'status='.self::STATUS_ACCEPT.' or status='.self::STATUS_PRE_ACCEPTED,
            ),
            // 'notactive'=>array(
            //     'condition'=>'status='.self::STATUS_NOACTIVE,
            // ),
            'banned'=>array(
                'condition'=>'status='.self::STATUS_APPLIED.' or status='.self::STATUS_DENIED.' or status='.self::STATUS_EXPELLED,
            ),
            'superuser'=>array(
                'condition'=>'superuser=1',
            ),
            'notsafe'=>array(
            	'select' => 'id, username, password, email, activkey, created_at, lastvisit_at, superuser, status',
            ),
        );
    }
	
	public function defaultScope()
    {
        return CMap::mergeArray(Yii::app()->getModule('user')->defaultScope,array(
            'alias'=>'user',
            'select' => 'user.id, user.username, user.email, user.created_at, user.lastvisit_at, user.superuser, user.status, user.key',
        ));
    }


	
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
			'UserStatus' => array(
				self::STATUS_APPLIED => UserModule::t('Applied'),
				self::STATUS_PRE_ACCEPTED => UserModule::t('Pre-Accepted'),
				self::STATUS_DENIED => UserModule::t('Denied'),
				self::STATUS_ACCEPT => UserModule::t('Accept'),
				self::STATUS_EXPELLED => UserModule::t('Expelled'),
				self::STATUS_LEFT => UserModule::t('Left'),


			),
			'AdminStatus' => array(
				'0' => UserModule::t('No'),
				'1' => UserModule::t('Yes'),
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
	
/**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        
        $criteria->compare('id',$this->id);
        
        //$criteria->compare('username',$this->username,true);
		$criteria->compare('LOWER(username)',strtolower($this->username),true); 

        $criteria->compare('password',$this->password);

        //$criteria->compare('email',$this->email,true);
		$criteria->compare('LOWER(email)',strtolower($this->email),true); 
	    
	    $criteria->compare('activkey',$this->activkey);
    	$criteria->compare('created_at',$this->created_at);
        $criteria->compare('lastvisit_at',$this->lastvisit_at);
        $criteria->compare('superuser',$this->superuser);
        $criteria->compare('status',$this->status);
        $criteria->compare('key',$this->key);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        	'pagination'=>array(
				'pageSize'=>Yii::app()->getModule('user')->user_page_size,
			),
        ));
    }

    /*
    public function getCreatetime() {
        return strtotime($this->created_at);
    }

    public function setCreatetime($value) {
        $this->created_at=date('Y-m-d H:i:s',$value);
    }

    public function getLastvisit() {
        return strtotime($this->lastvisit_at);
    }

    public function setLastvisit($value) {
        $this->lastvisit_at=date('Y-m-d H:i:s',$value);
    }

    public function afterSave() {
        if (get_class(Yii::app())=='CWebApplication'&&Profile::$regMode==false) {
            Yii::app()->user->updateSession();
        }
        return parent::afterSave();
    }
    */
}