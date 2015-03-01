<?php

/**
 * This is the model base class for the table "{{members}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Members".
 *
 * Columns in table "{{members}}" available as properties of the model,
 * followed by relations of table "{{members}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property string $lastvisit_at
 * @property integer $superuser
 * @property integer $status
 * @property string $key
 * @property string $created_at
 *
 * @property Whitelists[] $whitelists
 */
abstract class BaseMembers extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{members}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Members|Members', $n);
	}

	public static function representingColumn() {
		return 'username';
	}

	public function rules() {
		return array(
			array('username, password, created_at', 'required'),
			array('superuser, status', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('password, email, activkey', 'length', 'max'=>128),
			array('lastvisit_at, key', 'safe'),
			array('email, activkey, lastvisit_at, superuser, status, key', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, username, password, email, activkey, lastvisit_at, superuser, status, key, created_at', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'whitelists' => array(self::HAS_MANY, 'Whitelists', 'member_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'username' => Yii::t('app', 'Username'),
			'password' => Yii::t('app', 'Password'),
			'email' => Yii::t('app', 'Email'),
			'activkey' => Yii::t('app', 'Activkey'),
			'lastvisit_at' => Yii::t('app', 'Lastvisit At'),
			'superuser' => Yii::t('app', 'Superuser'),
			'status' => Yii::t('app', 'Status'),
			'key' => Yii::t('app', 'Key'),
			'created_at' => Yii::t('app', 'Created At'),
			'whitelists' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('LOWER(username)', strtolower($this->username), true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('LOWER(email)', strtolower($this->email), true);
		$criteria->compare('activkey', $this->activkey, true);
		$criteria->compare('lastvisit_at', $this->lastvisit_at, true);
		$criteria->compare('superuser', $this->superuser);
		$criteria->compare('status', $this->status);
		$criteria->compare('key', $this->key, true);
		$criteria->compare('created_at', $this->created_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}