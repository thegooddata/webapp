<?php

Yii::import('application.models._base.BaseSlowQueryLog');

class SlowQueryLog extends BaseSlowQueryLog
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('LOWER(query)', strtolower($this->query), true);
		$criteria->compare('count', $this->count);
		$criteria->compare('total_s', $this->total_s, true);
		$criteria->compare('avg_s', $this->avg_s, true);
		$criteria->compare('min_s', $this->min_s, true);
		$criteria->compare('max_s', $this->max_s, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            'sort' => array(
                'defaultOrder'=>'t.created_at DESC',
            ),
		));
	}
}