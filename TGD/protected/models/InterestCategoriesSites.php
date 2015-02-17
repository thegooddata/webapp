<?php

Yii::import('application.models._base.BaseInterestCategoriesSites');

class InterestCategoriesSites extends BaseInterestCategoriesSites
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
}