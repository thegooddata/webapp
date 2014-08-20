<?php

class TestController extends Controller {
    
    public function actionCurrencies() {
        $this->render('currencies');
    }
  
    public function actionDirname() {
        echo dirname(__FILE__);
    }
  
  public function actionGet_whitelist($domain, $member_id, $user_id, $service_name, $category) {
    
    
    $adtrack_type_id = Yii::app()->db->createCommand()
    ->select('t.id')
    ->from('tbl_adtracks_types t')
    ->where(array(
                'and',
                't.name = :category'),
    array(
            ':category'=>$category
            )
    )
    ->queryScalar();
    
    CVarDumper::dump($adtrack_type_id, 10, true);
    
    return;
  
    $data = Yii::app()->db->createCommand()
    ->setFetchMode(PDO::FETCH_OBJ)
    ->select('w.id as whitelist_id')
    ->from('tbl_whitelists w')
    ->join('tbl_adtracks_sources s','s.id=w.adtracks_sources_id')
    ->join('tbl_adtracks_types ty','ty.id=s.adtrack_type_id')
    ->where(array(
                'and',
                'w.adtracks_sources_id = s.id',
                's.name = :service_name',
                'ty.name = :category',
                '(w.member_id = :member_id or w.user_id = :user_id)',
                'w.domain = :domain',
                ),
        array(
                ':domain'=>$domain,
                ':member_id'=>$member_id,
            		':user_id'=>$user_id,
                ':service_name'=>$service_name,
                ':category'=>$category,
                )
        )
    ->queryAll();
			                
			                
    CVarDumper::dump($data, 10, true);
  }
			                
			                
  public function actionGet_source($category, $service_name) {
    // get source by name and category?
    $data = Yii::app()->db->createCommand()
    ->setFetchMode(PDO::FETCH_OBJ)
    ->select('s.id as adtracks_sources_id, c.id as category_id')
    ->from('tbl_adtracks_sources s')
    ->join('tbl_adtracks_types c','c.id=s.adtrack_type_id')
    ->where(array(
                'and',
                'c.name = :category',
                's.name = :service_name'),
        array(
                ':category'=>$category,
                ':service_name'=>$service_name)
        )
    ->queryAll();
    CVarDumper::dump($data, 10, true);
  }
  
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