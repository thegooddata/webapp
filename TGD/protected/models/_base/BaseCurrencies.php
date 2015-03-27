<?php

/**
 * This is the model base class for the table "{{currencies}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Currencies".
 *
 * Columns in table "{{currencies}}" available as properties of the model,
 * followed by relations of table "{{currencies}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $code
 * @property string $name_en
 * @property string $name_es
 * @property string $exchange_rate
 *
 * @property Incomes[] $incomes
 * @property Loans[] $loans
 */
abstract class BaseCurrencies extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{currencies}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Currencies|Currencies', $n);
	}

	public static function representingColumn() {
		return 'code';
	}

	public function rules() {
		return array(
			array('code, name_en, name_es', 'length', 'max'=>255),
			array('exchange_rate', 'length', 'max'=>13),
			array('code, name_en, name_es, exchange_rate', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, code, name_en, name_es, exchange_rate', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'incomes' => array(self::HAS_MANY, 'Incomes', 'currency'),
			'loans' => array(self::HAS_MANY, 'Loans', 'currency'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'code' => Yii::t('app', 'Code'),
			'name_en' => Yii::t('app', 'Name En'),
			'name_es' => Yii::t('app', 'Name Es'),
			'exchange_rate' => Yii::t('app', 'Exchange Rate'),
			'incomes' => null,
			'loans' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('code', $this->code, true);
		$criteria->compare('LOWER(name_en)', strtolower($this->name_en), true);
		$criteria->compare('LOWER(name_es)', strtolower($this->name_es), true);
		$criteria->compare('exchange_rate', $this->exchange_rate, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}