<?php

/**
 * This is the model base class for the table "{{slow_query_log}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "SlowQueryLog".
 *
 * Columns in table "{{slow_query_log}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $query
 * @property integer $count
 * @property string $total_s
 * @property string $avg_s
 * @property string $min_s
 * @property string $max_s
 * @property string $created_at
 * @property string $updated_at
 *
 */
abstract class BaseSlowQueryLog extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{slow_query_log}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'SlowQueryLog|SlowQueryLogs', $n);
	}

	public static function representingColumn() {
		return 'query';
	}

	public function rules() {
		return array(
			array('count', 'numerical', 'integerOnly'=>true),
			array('total_s, avg_s, min_s, max_s', 'length', 'max'=>13),
			array('query, created_at, updated_at', 'safe'),
			array('query, count, total_s, avg_s, min_s, max_s, created_at, updated_at', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, query, count, total_s, avg_s, min_s, max_s, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'query' => Yii::t('app', 'Query'),
			'count' => Yii::t('app', 'Count'),
			'total_s' => Yii::t('app', 'Total S'),
			'avg_s' => Yii::t('app', 'Avg S'),
			'min_s' => Yii::t('app', 'Min S'),
			'max_s' => Yii::t('app', 'Max S'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('query', $this->query, true);
		$criteria->compare('count', $this->count);
		$criteria->compare('total_s', $this->total_s, true);
		$criteria->compare('avg_s', $this->avg_s, true);
		$criteria->compare('min_s', $this->min_s, true);
		$criteria->compare('max_s', $this->max_s, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}