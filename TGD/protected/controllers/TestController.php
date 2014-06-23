<?php

class TestController extends Controller {
  public function actionRedOctober() {
    
    CVarDumper::dump(Yii::app()->redoctober->encrypt("test"), 10, true);
    die();
  
  }
}