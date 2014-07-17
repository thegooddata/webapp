<?php

class TestController extends Controller {
  
  public function actionTest_email() {
    $message = new YiiMailMessage;
    $message->subject = 'This is a test email';
    $message->setBody("<h1>test email</h1>",'text/html');
    $message->addTo("atrandafirc@gmail.com");
    $message->setFrom(Yii::app()->params['marcosEmail'], Yii::app()->params['marcosEmailName']);
    Yii::app()->mail->send($message);
  }
  
  public function actionRedOctober() {
    
    CVarDumper::dump(Yii::app()->redoctober->encrypt("test"), 10, true);
    die();
  
  }
  public function actionOa_user() {
    $oa_errors=array();
    Yii::app()->openAtrium->createUser("test_150720141851", "testing", "test_150720141851@gmail.com", "test_150720141851", $oa_errors);
    var_dump($oa_errors);
  }
}