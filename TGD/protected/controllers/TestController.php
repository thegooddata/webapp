<?php

class TestController extends Controller {
  
    public function actionGeoip($ip=null) {
      if (!$ip) {
        $ip=Yii::app()->request->userHostAddress;
      }
      var_dump(Yii::app()->geoip->lookupCountryCode($ip));
    }
  
    /**
     * Testing the error page and email notification.
     */
    public function actionErrorPage() {
      $this->unexistingProperty='somevalue';
    }
  
    public function actionSlowQueryLog() {
      $rows=Yii::app()->db->createCommand("
      SELECT id, user_id, member_id, adtracks_sources_id, domain, url, usertime, 
            status, created_at, updated_at
       FROM tbl_adtracks limit 150000  
      ")->queryAll();
      echo count($rows);
    }
  
    public function actionResetApprovedMember() {
      
      $pii=MembersPii::model()->findByPk("3561170");
      $member=User::model()->findByPk("14");
      
      $pii->member_id=$member->id;
      $pii->update('member_id');
      
      $member->status=User::STATUS_APPLIED;
      $member->update('status');
      
      echo 'reset done!';
      
    }
    public function actionNewMemberEmail() {
      $pii=MembersPii::model()->findByPk("3561170");
      $member=User::model()->findByPk("14");
      $sent=Yii::app()->getModule('user')->sendNewMemberEmail($pii, $member);
      var_dump($sent);
    }
    public function actionOaApi() {
        
        if (date_default_timezone_get()) {
            echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
        }
        
        echo date('Y-m-d H:i:s') . '<br />';
        
        $api_url='http://www.tgd.local/oaApi';
        $api_token='yayme';
        
//        echo '<h1>Testing Index action.</h1>';
//        $hello_world_url="$api_url/index?token=$api_token";
//        
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $hello_world_url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $output = curl_exec($ch);
//        echo '<pre>';
//        print_r(json_decode($output, true));
//        echo '</pre>';
        
        echo '<h1>Testing getLoggedUserBySessionId action.</h1>';
        $session_id='rskkec6tchdv1jaljjeciri4r3';
        $getLoggedUserBySessionId_url="$api_url/getLoggedUserBySessionId?token=$api_token&session_id=$session_id";
        
        echo $getLoggedUserBySessionId_url."<br />";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $getLoggedUserBySessionId_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $user=json_decode($output, true);
        echo '<pre>';
        print_r($user);
        if (isset($user['updated'])) {
            echo date("r", $user['updated']);
        }
        echo '</pre>';
        
//        echo '<h1>Testing getUserInfoById action.</h1>';
//        $user_id=isset($user['id']) ? $user['id'] : null;
//        $getUserInfoById_url="$api_url/getUserInfoById?token=$api_token&user_id=$user_id";
//        
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $getUserInfoById_url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $output = curl_exec($ch);
//        echo '<pre>';
//        print_r(json_decode($output, true));
//        echo '</pre>';
        
    }
    
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
  
}