<?php

Yii::import('application.models._base.BaseCurrencies');

class Currencies extends BaseCurrencies
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}