<?php

Yii::import('application.models._base.BaseQueriesBlacklist');

class QueriesBlacklist extends BaseQueriesBlacklist
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}