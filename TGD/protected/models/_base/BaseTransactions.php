<?php

/**
 * This is the model base class for the table "{{transactions}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Transactions".
 *
 * Columns in table "{{transactions}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $transaction_id
 * @property string $type
 * @property string $status
 * @property string $currency
 * @property string $amount
 * @property integer $member_id
 * @property string $created_at
 * @property string $updated_at
 *
 */
abstract class BaseTransactions extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{transactions}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Transactions|Transactions', $n);
	}

	public static function representingColumn() {
		return 'transaction_id';
	}

	public function rules() {
		return array(
			array('transaction_id, type, status, currency, amount', 'required'),
			array('member_id', 'numerical', 'integerOnly'=>true),
			array('transaction_id, type, status, currency, amount', 'length', 'max'=>128),
			array('created_at, updated_at', 'safe'),
			array('member_id, created_at, updated_at', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, transaction_id, type, status, currency, amount, member_id, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'transaction_id' => Yii::t('app', 'Transaction'),
			'type' => Yii::t('app', 'Type'),
			'status' => Yii::t('app', 'Status'),
			'currency' => Yii::t('app', 'Currency'),
			'amount' => Yii::t('app', 'Amount'),
			'member_id' => Yii::t('app', 'Member'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('transaction_id', $this->transaction_id, true);
		$criteria->compare('type', $this->type, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('currency', $this->currency, true);
		$criteria->compare('amount', $this->amount, true);
		$criteria->compare('member_id', $this->member_id);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}