<?php

Yii::import('application.models._base.BaseQueries');

class Queries extends BaseQueries
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	// public function search(array $columns)
 //    {
 //        $criteria=new CDbCriteria;
 
 //        // if (isset($_GET['sSearch'])) {
 //        //     $criteria->compare('created_at',$_GET['sSearch'],true,'OR');
 //        //     $criteria->compare('rate',$_GET['sSearch'],false,'OR');
 //        //     //$criteria->compare('currency_id',$_GET['sSearch'],true,'OR');
 //        // }
 
 //        // $criteria->compare('id',$this->id);
 //        // $criteria->compare('date',$this->date,true);
 //        // $criteria->compare('rate',$this->rate);
 //        // $criteria->compare('currency_id',$this->currency_id);
 //        // $criteria->compare('precious_metal_id',$this->precious_metal_id);
 
 //        return new CActiveDataProvider($this, array(
 //            'criteria'=>$criteria,
 //            'sort'=>new EDTSort(__CLASS__, $columns),
 //            'pagination'=>new EDTPagination,
 //        ));
 //    }

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