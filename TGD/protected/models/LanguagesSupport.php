<?php

Yii::import('application.models._base.BaseLanguagesSupport');

class LanguagesSupport extends BaseLanguagesSupport
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
  
  public function findLanguage($lang){
      $language = $this::model()->findByAttributes(array('lang'=>strtolower($lang)));
      return $language;
  }
  
}