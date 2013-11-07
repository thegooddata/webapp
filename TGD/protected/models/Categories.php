<?php

Yii::import('application.models._base.BaseCategories');

class Categories extends BaseCategories
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}