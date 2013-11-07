<?php

Yii::import('application.models._base.BaseWhitelists');

class Whitelists extends BaseWhitelists
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}