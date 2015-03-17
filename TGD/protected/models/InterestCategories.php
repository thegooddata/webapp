<?php

Yii::import('application.models._base.BaseInterestCategories');

class InterestCategories extends BaseInterestCategories
{
    public $categories = array();

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /* Generate timestamps auto */
    public function beforeSave() {
        $this->updated_at = new CDbExpression('NOW()');

        return parent::beforeSave();
    }

    public function getCategoriesRating($parent_id, $member_id, $datefrom, $dateinto){
        return Yii::app()->db
            ->createCommand("
                  SELECT c.*, (CASE WHEN EXISTS (SELECT 1 FROM tbl_interest_categories c1 WHERE c1.parent_id = c.id) THEN 1 ELSE 0 END) as has_sub
                  FROM _getcategoriesrating($parent_id, $member_id, '$datefrom', '$dateinto') c
                  ORDER BY c.id
                  ")
            ->setFetchMode(PDO::FETCH_OBJ)->queryAll();
    }

    public function getInterestedCategories($member_id, $datefrom, $dateinto){
        return Yii::app()->db
            ->createCommand("
                  select *
                    from tbl_interest_categories c
                    join _getcategoriesvisitcounter(c.id, '$datefrom', '$dateinto') s
                        on s.member_id = $member_id
                    where c.parent_id = 0 AND c.status = 1
                    ORDER BY s.counter DESC
                    LIMIT 3
                  ")
            ->setFetchMode(PDO::FETCH_OBJ)->queryAll();
    }

    public function getFanCategories($member_id, $datefrom, $dateinto){
        return Yii::app()->db
            ->createCommand("
                  select *
                    from tbl_interest_categories c
                    join _getcategoriesvisitcounter(c.id, '$datefrom', '$dateinto') s
                        on s.member_id = $member_id
                    where c.parent_id IN (SELECT id FROM tbl_interest_categories WHERE parent_id=0 AND status = 1)
                    ORDER BY s.counter DESC
                    LIMIT 5
                  ")
            ->setFetchMode(PDO::FETCH_OBJ)->queryAll();
    }

    public function checkCategoriesRating($member_id, $datefrom, $dateinto){
        return Yii::app()->db
            ->createCommand("
                  SELECT id FROM tbl_interest_categories_counts
                  WHERE member_id=$member_id
                    AND date_visit BETWEEN '$datefrom' AND '$dateinto'
                  LIMIT 1
                  ")
            ->queryScalar();
    }

    public function getParentCategories($parent_id){
        if(!empty($parent_id)) {
            $category = InterestCategories::model()->findByPk($parent_id);
            if (!empty($category)) {
                if(empty($this->categories[$category['id']])) {
                    $this->categories[$category['id']] = array(
                        'category' => $category['category'],
                        'parent_id' => $category['parent_id'],
                        'id' => $category['id'],
                    );
                }
                $this->getParentCategories($category['parent_id']);
            }
        }
        return $this->categories;
    }

    public function getSubCategories($id, $status = 1){
        return Yii::app()->db
            ->createCommand("SELECT id FROM _getsubcategories($id, $status)")
            ->queryAll();
    }

    public function setUserCategoriesCache($member_id, $datefrom, $dateinto){
        $data = array();
        $interest_categories = InterestCategories::model()->getInterestedCategories($member_id, $datefrom, $dateinto);
        $fan_categories = InterestCategories::model()->getFanCategories($member_id, $datefrom, $dateinto);

        if(!empty($interest_categories)){
            foreach($interest_categories as $category){
                $data['interest'][] = array(
                    'id' => $category->id,
                    'category' => $category->category,
                );
            }
        }
        if(!empty($fan_categories)){
            foreach($fan_categories as $category){
                $data['fan'][] = array(
                    'id' => $category->id,
                    'category' => $category->category,
                );
            }
        }

        if(!empty($data)){
            $updatedRows = Yii::app()->db->createCommand()->update(
                'tbl_interest_categories_cache',
                array('member_id' => $member_id, 'data' => json_encode($data), 'daydate'=>date('Y-m-d')),
                'member_id = :id', array(':id' => $member_id)
            );
            if($updatedRows == 0) {
                Yii::app()->db->createCommand()->insert(
                    'tbl_interest_categories_cache',
                    array('member_id' => $member_id, 'data' => json_encode($data))
                );
            }
            return true;
        }

        return false;
    }

    public function getUserCategoriesCache($member_id, $date){
        $data = array();
        $res = Yii::app()->db->createCommand()
            ->select('data')
            ->from('tbl_interest_categories_cache')
            ->where(
                array(
                    'and',
                    'member_id= :member_id',
                    'daydate= :date',
                ), array(
                    'member_id' => $member_id,
                    'date' => $date,
                )
            )
            ->queryScalar();
        if(!empty($res)){
            $data = json_decode($res);
        }

        return $data;
    }

    public function deleteUserCategoriesCache($member_id){
        return Yii::app()->db->createCommand()->delete('tbl_interest_categories_cache', 'member_id=:member_id', array('member_id' => $member_id));
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