<?php

Yii::import('application.models._base.BaseThreats');

class Threats extends BaseThreats
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}