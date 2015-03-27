<?php

/**
 * This is the model base class for the table "{{achievements}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Achievements".
 *
 * Columns in table "{{achievements}}" available as properties of the model,
 * followed by relations of table "{{achievements}}" available as properties of the model.
 *
 * @property string $id
 * @property integer $achievement_type_id
 * @property string $link_en
 * @property string $link_es
 * @property string $text_en
 * @property string $text_es
 * @property string $achievements_start
 * @property string $achievements_finish
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AchievementsTypes $achievementType
 */
abstract class BaseAchievements extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{achievements}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Achievements|Achievements', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('id', 'required'),
			array('achievement_type_id', 'numerical', 'integerOnly'=>true),
			array('id, link_en, link_es', 'length', 'max'=>255),
			array('text_en, text_es, achievements_start, achievements_finish, created_at, updated_at', 'safe'),
			array('achievement_type_id, link_en, link_es, text_en, text_es, achievements_start, achievements_finish, created_at, updated_at', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, achievement_type_id, link_en, link_es, text_en, text_es, achievements_start, achievements_finish, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'achievementType' => array(self::BELONGS_TO, 'AchievementsTypes', 'achievement_type_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'achievement_type_id' => null,
			'link_en' => Yii::t('app', 'Link En'),
			'link_es' => Yii::t('app', 'Link Es'),
			'text_en' => Yii::t('app', 'Text En'),
			'text_es' => Yii::t('app', 'Text Es'),
			'achievements_start' => Yii::t('app', 'Achievements Start'),
			'achievements_finish' => Yii::t('app', 'Achievements Finish'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'achievementType' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('LOWER(id)', $this->id, true);
		$criteria->compare('LOWER(achievement_type_id)', $this->achievement_type_id);
		$criteria->compare('link_en', $this->link_en, true);
		$criteria->compare('link_es', $this->link_es, true);
		$criteria->compare('LOWER(text_en)', strtolower($this->text_en), true);
		$criteria->compare('LOWER(text_es)', strtolower($this->text_es), true);
		$criteria->compare('achievements_start', $this->achievements_start, true);
		$criteria->compare('achievements_finish', $this->achievements_finish, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}