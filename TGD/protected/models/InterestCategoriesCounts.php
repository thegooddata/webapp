<?php

Yii::import('application.models._base.BaseInterestCategoriesCounts');

class InterestCategoriesCounts extends BaseInterestCategoriesCounts
{


    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /* Generate timestamps auto */
    public function beforeSave() {
        if ($this->isNewRecord)
            $this->date_visit = date('Y-m-d');

        return parent::beforeSave();
    }
}