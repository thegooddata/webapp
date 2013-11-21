<?php

Yii::import('application.models._base.BaseWhitelists');

class Whitelists extends BaseWhitelists
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/* Generate timestamps auto */
	public function beforeSave() {
	    if ($this->isNewRecord)
	        $this->created_at = new CDbExpression('NOW()');
	 
	    $this->updated_at = new CDbExpression('NOW()');
	 
	    return parent::beforeSave();
	}


	/* Generate multilanguage fields */
	public function __get($name)
    {
    	try 
 		{
 			return parent::__get($name);
		} 
		catch (Exception $e1) 
		{
			try 
	 		{
				$language = Yii::app()->language;
	 			return parent::__get($name.'_'.$language);
			} 
			catch (Exception $e2) 
			{
				throw $e1;
			}	

		}	
	}

	public function __set($name,$value)
    {
    	try 
 		{
 			return parent::__set($name,$value);
		} 
		catch (Exception $e1) 
		{
			try 
	 		{
				$language = Yii::app()->language;
	 			return parent::__set($name.'_'.$language,$value);
			} 
			catch (Exception $e2) 
			{
				throw $e1;
			}	

		}	
	}
}