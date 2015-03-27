<?php

/**
 * This is the model base class for the table "{{incomes_types}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "IncomesTypes".
 *
 * Columns in table "{{incomes_types}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_es
 *
 */
abstract class BaseIncomesTypes extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{incomes_types}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'IncomesTypes|IncomesTypes', $n);
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
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('LOWER(name_en)', strtolower($this->name_en), true);
		$criteria->compare('LOWER(name_es)', strtolower($this->name_es), true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}