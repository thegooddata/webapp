<?php

class AdminModuleController extends GxController {

  public $displayMenu = true;

  public function filters() {
    return array('accessControl'); // perform access control for CRUD operations
  }

  public function accessRules() {
    return array(
        array('allow',
            'expression' => 'Yii::app()->user->isAdmin()',
        ),
        array('deny'),
    );
  }

}