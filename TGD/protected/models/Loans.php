<?php

Yii::import('application.models._base.BaseLoans');

class Loans extends BaseLoans
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/* Generate timestamps auto */
	public function beforeSave() {
	    if ($this->isNewRecord)
	        $this->created_at = new CDbExpression('NOW()');
	 
	    $this->updated_at = new CDbExpression('NOW()');
        
        $this->beforeSaveZeroFields();
	 
	    return parent::beforeSave();
	}
    
    /**
     * Fill some numerical fields with value 0 if left blank.
     */
    public function beforeSaveZeroFields() {
      $fields=array(
          'amount',
          'contribution',
          'paidback',
          'loss',
      );
      foreach ($fields as $key) {
        if (empty($this->{$key})) {
          $this->{$key}=0;
        }
      }
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