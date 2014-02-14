<?php

/**
 * This is the model base class for the table "{{loans_leaders}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "LoansLeaders".
 *
 * Columns in table "{{loans_leaders}}" available as properties of the model,
 * followed by relations of table "{{loans_leaders}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_es
 *
 * @property Loans[] $loans
 */
abstract class BaseLoansLeaders extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{loans_leaders}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'LoansLeaders|LoansLeaders', $n);
	}

	public static function representingColumn() {
		return 'name_en';
	}

	public function rules() {
		return array(
			array('name_en, name_es', 'length', 'max'=>255),
			array('name_en, name_es', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name_en, name_es', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'loans' => array(self::HAS_MANY, 'Loans', 'leader'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name_en' => Yii::t('app', 'Name En'),
			'name_es' => Yii::t('app', 'Name Es'),
			'loans' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name_en', $this->name_en, true);
		$criteria->compare('name_es', $this->name_es, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}