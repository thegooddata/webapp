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

    public function categoriesAllCounts()
    {
        $categories = array();
        $all_categories = InterestCategories::model()->findAll('counter > 0');
        foreach($all_categories as $category){
            $categories[$category['id']] = array(
                'counter' => $category['counter'],
                'category' => $category['category'],
                'parent_id' => $category['parent_id'],
                'url' => $category['url']
            );
        }

        return $categories;
    }

    public function categoriesCounts($member_id = 0)
    {
        $this->categories = array();
        $where = '';
        if($member_id > 0){
            $where = "cc.member_id = $member_id AND";
        }
        $counts = Yii::app()->db->createCommand(
            "SELECT SUM(cc.counter) as counter, cs.category_id, ic.category, ic.url
                FROM tbl_interest_categories_sites cs
                JOIN tbl_interest_categories_counts cc ON cs.site=cc.site
                JOIN tbl_interest_categories ic ON ic.id=cs.category_id
                WHERE $where cc.date_visit >= (now() - '7 days'::interval) AND cc.date_visit <=  now()
                GROUP BY cs.category_id, ic.category, ic.url"
        )->queryAll();

        foreach($counts as $count){
            $this->saveParentCategoriesCounts($count['category_id'], $count['counter']);
        }

        return $this->categories;
    }

    protected function saveParentCategoriesCounts($parent_id, $count){
        if(!empty($parent_id)) {
            $category = InterestCategories::model()->findByPk($parent_id);
            if (!empty($category)) {
                if(empty($this->categories[$category['id']])) {
                    $this->categories[$category['id']] = array(
                        'counter' => (int)$category['counter'] + (int)$count,
                        'category' => $category['category'],
                        'parent_id' => $category['parent_id'],
                        'url' => $category['url']
                    );
                }else{
                    $this->categories[$category['id']]['counter'] += (int)$count;
                }
                $this->saveParentCategoriesCounts($category['parent_id'], $count);
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