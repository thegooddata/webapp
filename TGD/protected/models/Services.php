<?php

Yii::import('application.models._base.BaseServices');

class Services extends BaseServices
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}