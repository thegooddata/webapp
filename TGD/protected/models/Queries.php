<?php

Yii::import('application.models._base.BaseQueries');

class Queries extends BaseQueries
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}