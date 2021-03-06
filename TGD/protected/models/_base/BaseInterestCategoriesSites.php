<?php

/**
 * This is the model base class for the table "{{interest_categories_sites}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "InterestCategoriesSites".
 *
 * Columns in table "{{interest_categories_sites}}" available as properties of the model,
 * followed by relations of table "{{interest_categories_sites}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $site
 * @property integer $category_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 */
abstract class BaseInterestCategoriesSites extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{interest_categories_sites}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'InterestCategoriesSites|InterestCategoriesSites', $n);
	}

	public static function representingColumn() {
		return 'site';
	}

	public function rules() {
		return array(
			array('category_id, status', 'numerical', 'integerOnly'=>true),
			array('category_id, site, status, created_at, updated_at', 'safe'),
			array('id, site, category_id, status, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array();
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'site' => Yii::t('app', 'Site'),
			'category_id' => Yii::t('app', 'Category'),
			'status' => Yii::t('app', 'Status'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('LOWER(site)', strtolower($this->site_id), true);
		$criteria->compare('category_id', $this->status);
		$criteria->compare('LOWER(status)', strtolower($this->status));
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}