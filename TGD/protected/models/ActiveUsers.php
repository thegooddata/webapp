<?php

/**
 * This is the model class for table "{{active_users}}".
 *
 * The followings are the available columns in table '{{active_users}}':
 * @property integer $id
 * @property integer $member_id
 * @property string $user_id
 * @property string $member_or_user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $host
 * @property string $country
 */
class ActiveUsers extends CActiveRecord {

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{active_users}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('member_id', 'numerical', 'integerOnly' => true),
        array('user_id, member_or_user_id', 'length', 'max' => 255),
        array('created_at, updated_at, country', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, member_id, user_id, member_or_user_id, created_at, updated_at', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
        'id' => 'ID',
        'member_id' => 'Member',
        'user_id' => 'User',
        'member_or_user_id' => 'Member Or User',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
    );
  }

  /**
   * Retrieves a list of models based on the current search/filter conditions.
   *
   * Typical usecase:
   * - Initialize the model fields with values from filter form.
   * - Execute this method to get CActiveDataProvider instance which will filter
   * models according to data in model fields.
   * - Pass data provider to CGridView, CListView or any similar widget.
   *
   * @return CActiveDataProvider the data provider that can return the models
   * based on the search/filter conditions.
   */
  public function search() {
    // @todo Please modify the following code to remove attributes that should not be searched.

    $criteria = new CDbCriteria;

    $criteria->compare('id', $this->id);
    $criteria->compare('member_id', $this->member_id);
    $criteria->compare('user_id', $this->user_id, true);
    $criteria->compare('member_or_user_id', $this->member_or_user_id, true);
    $criteria->compare('created_at', $this->created_at, true);
    $criteria->compare('updated_at', $this->updated_at, true);

    return new CActiveDataProvider($this, array(
        'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return ActiveUsers the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * Logs active user, we could play with this to improve it.
   * Basically there could be too much because if user logs out we're counting another active anonymous user.
   * @param type $user_id
   * @return boolean
   */
  static public function logActiveUser($user_id = null) {
    
    $prefix=date("Y-m-d"); // quick fix so we store data every day
    
    // temporary in case extension is not updated and doesn't send a user_id
    if ($user_id==null) {
      $user_id=Yii::app()->getSession()->getSessionId();
    }
    
    $member_id = null;
    if (!Yii::app()->user->isGuest) {
      $member_id = Yii::app()->user->id;
    }
    $model = new ActiveUsers();
    $model->user_id = $user_id?$user_id:NULL;
    $model->member_id = $member_id?$member_id:NULL;
    $model->member_or_user_id = $member_id ? $member_id : $user_id;
    
    $model->host=ADbHelper::encrypt_ip(Yii::app()->request->userHostAddress);

    $location = Yii::app()->geoip->lookupLocation();
      if(!empty($location->countryCode)){
          $model->country = $location->countryCode;
      }

    $activeUserLogged = Yii::app()->user->getState('activeUserLogged', null);
    
    if ($activeUserLogged===$prefix.$model->member_or_user_id) {
      return true;
    } else {
      Yii::app()->user->setState('activeUserLogged', $prefix.$model->member_or_user_id);
    }
    
    return $model->save();
  }

  public function beforeSave() {
    if ($this->isNewRecord)
      $this->created_at = new CDbExpression('NOW()');

    $this->updated_at = new CDbExpression('NOW()');

    return parent::beforeSave();
  }

}
