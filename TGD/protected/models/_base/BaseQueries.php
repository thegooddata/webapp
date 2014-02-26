<?php

/**
 * This is the model base class for the table "{{queries}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Queries".
 *
 * Columns in table "{{queries}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $member_id
 * @property string $user_id
 * @property string $provider
 * @property string $data
 * @property string $query
 * @property string $lang
 * @property string $share
 * @property string $usertime
 * @property string $language_support
 * @property string $created_at
 * @property string $updated_at
 *
 */
abstract class BaseQueries extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{queries}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Queries|Queries', $n);
	}

	public static function representingColumn() {
		return 'provider';
	}

	public function rules() {
		return array(
			array('provider, data, query, lang', 'required'),
			array('member_id', 'numerical', 'integerOnly'=>true),
			array('user_id, language_support', 'length', 'max'=>255),
			array('provider, lang, share', 'length', 'max'=>128),
			array('data', 'length', 'max'=>256),
			array('usertime, created_at, updated_at', 'safe'),
			array('member_id, user_id, share, usertime, language_support, created_at, updated_at', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, member_id, user_id, provider, data, query, lang, share, usertime, language_support, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'member_id' => Yii::t('app', 'Member'),
			'user_id' => Yii::t('app', 'User'),
			'provider' => Yii::t('app', 'Provider'),
			'data' => Yii::t('app', 'Data'),
			'query' => Yii::t('app', 'Query'),
			'lang' => Yii::t('app', 'Lang'),
			'share' => Yii::t('app', 'Share'),
			'usertime' => Yii::t('app', 'Usertime'),
			'language_support' => Yii::t('app', 'Language Support'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('member_id', $this->member_id);
		$criteria->compare('user_id', $this->user_id, true);
		$criteria->compare('provider', $this->provider, true);
		$criteria->compare('data', $this->data, true);
		$criteria->compare('query', $this->query, true);
		$criteria->compare('lang', $this->lang, true);
		$criteria->compare('share', $this->share, true);
		$criteria->compare('usertime', $this->usertime, true);
		$criteria->compare('language_support', $this->language_support, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}