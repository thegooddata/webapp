<?php

Yii::import('application.models._base.BaseHistory');

class History extends BaseHistory
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}