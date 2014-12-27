<?php

Yii::import('application.models._base.BaseAchievements');

class Achievements extends BaseAchievements
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('achievement_type_id', $this->achievement_type_id);
		$criteria->compare('link_en', $this->link_en, true);
		$criteria->compare('link_es', $this->link_es, true);
		$criteria->compare('text_en', $this->text_en, true);
		$criteria->compare('text_es', $this->text_es, true);
		$criteria->compare('achievements_start', $this->achievements_start, true);
		$criteria->compare('achievements_finish', $this->achievements_finish, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            'sort'=>array(
                'defaultOrder'=>'t.created_at DESC',
            ),
		));
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
    
    public function beforeValidate() {
      if (parent::beforeValidate()) {
        
        if ($this->getIsNewRecord()) {
          
          // set automatically a new id
          if (!$this->id) {
            $max_id=Yii::app()->db->createCommand("SELECT max(id) FROM {{achievements}}")->queryScalar();
            if ($max_id) {
              $max_id++;
            } else {
              $max_id=1;
            }
            $this->id=$max_id;
          }
          
          
        }
        
        return true;
      }
    }
}