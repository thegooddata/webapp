<?php

class TestController extends Controller {
  public function actionRedOctober() {
    
    CVarDumper::dump(Yii::app()->redoctober->encrypt("test"), 10, true);
    die();
  
  }
  public function actionOa_user() {
    $oa_errors=array();
    Yii::app()->openAtrium->createUser("u777", "7777777", "atrandafirc77@gmail.com", "usr77", $oa_errors);
    var_dump($oa_errors);
  }
}