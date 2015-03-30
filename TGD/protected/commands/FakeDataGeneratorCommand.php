<?php

/**
 * This tool is used to generate fake user data in the webapp so we can populate 
 * development databases with data most real as possible for proper testing.
 */
class FakeDataGeneratorCommand extends TGDCommand {

  /**
   * Should we actually run the command?
   * @var bool
   */
  public $execute = false;

  /**
   * Does some initial checking before running a command
   * @param string $action
   * @param array $params
   * @return boolean
   */
  public function beforeAction($action, $params) {
    $this->debug("Running Fake Data Generator..");
    if (!(bool) $this->execute) {
      $this->debug("To prevent wrong usage of this tool, this command won't be run until you use param --execute=1");
      return false;
    }
    return parent::beforeAction($action, $params);
  }

  /**
   * How many members to use
   * @var integer
   */
  public $apiMembersLimit = 5;

  /**
   * How many anonymous users to use
   * @var integer
   */
  public $apiUsersLimit = 5;
  
  /**
   * Schema and host to use for creating API urls
   * @var string
   */
  public $hostInfo=null;

  /**
   * Makes fake API requests
   * 
   * @param integer $requests How many requests to make to the API in this call
   * @param string $hostInfo Schema and host to use for creating API urls
   * @param integer $member_id Optional member ID if we want to create data only for this user
   */
  public function actionApi($requests = 50, $hostInfo = 'http://www.tgd.local/', $member_id = null) {
    // save host info for later
    $this->hostInfo=$hostInfo;
    $this->debug("Making {$requests} fake API requests to {$hostInfo}, member_id : $member_id..");
    $users = $this->getApiUsers($member_id);
    if ($users) {
      $requests_per_user = ceil ($requests / count($users));
      foreach ($users as $user) {
        $this->logActiveUser($user);
        $this->makeApiRequestsForUser($user, $requests_per_user);
      }
    } else {
      $this->debug("No users, quitting.");
    }
  }
  
  /**
   * Logs the current user as active user on the webapp
   * @param array $user
   */
  private function logActiveUser($user) {
    
    $user_id=$member_id=null;
    
    if (isset($user['user_id'])) {
      $user_id=$user['user_id'];
    }
    if (isset($user['member_id'])) {
      $member_id=$user['member_id'];
    }
    
    $member_or_user_id = $member_id ? $member_id : $user_id;
    
    $cacheKey = 'fakeDataGenerator_apiLogActiveUser_' . md5($member_or_user_id)."_".date('Y-m-d');
    
    $this->debug("logActiveUser: {$cacheKey}");
    
    $active_user = Yii::app()->cache->get($cacheKey);
    if ($active_user === false) {
      $model = new ActiveUsers();
      $model->user_id = $user_id?$user_id:NULL;
      $model->member_id = $member_id?$member_id:NULL;
      $model->member_or_user_id = $member_or_user_id;

      $model->host=ADbHelper::encrypt_ip('127.0.0.1');
      $model->save();
      Yii::app()->cache->set($cacheKey, $member_or_user_id, (60 * 60 * 24));
    }
        
  }
  
  /**
   * 
   * @param array $user User information
   * @param integer $requests_per_user Requests to run per user
   */
  private function makeApiRequestsForUser($user, $requests_per_user) {
    $as=array();
    if (isset($user['member_id'])) {
      $as[]="member_id : {$user['member_id']}";
    }
    if (isset($user['user_id'])) {
      $as[]="user_id : {$user['user_id']}";
    }
    $this->debug("Making requests AS ".  implode(" ", $as));
    $apiCommands=array('queries','browsing','browsing');
    
    $i = 0;
    do {
      $apiCommand=$apiCommands[array_rand($apiCommands)];
      $this->debug("Running $apiCommand");
      if ($apiCommand==='queries') {
        $this->makeApiQueriesRequest($user, $i);
      } elseif ($apiCommand==='browsing') {
        $this->makeApiBrowsingRequest($user, $i);
      }
    } while ($i < $requests_per_user);
    
  }
  
  /**
   * Make search query request to API
   * @param array $user
   * @param integer $i
   */
  private function makeApiQueriesRequest($user, &$i) {
    
    $this->debug("> makeApiQueriesRequest");
    
    $providers=array('google','yahoo');
    $provider_query=array(
        'google'=>'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q={keyword}',
        'yahoo'=>'https://search.yahoo.com/search;_ylt=AhlZq6D8P.O2g_TZK_rWrNObvZx4?p={keyword}&toggle=1&cop=mss&ei=UTF-8&fr=yfp-t-252&fp=1',
    );
    $data='fake data generator '.  rand(0, 999999);
    $provider=$providers[array_rand($providers)];
    $languages=array('es','en');
    $lang=$languages[array_rand($languages)];
    $language_support=($lang==='es'?'false':'true');
    
    $fields=array(
      'member_id'=>isset($user['member_id'])?$user['member_id']:'',
      'user_id'=>isset($user['user_id'])?$user['user_id']:'',
      'provider'=>$provider,
      'data'=>$data,
      'query'=>  str_replace("{keyword}", $data, $provider_query[$provider]),
      'lang'=>$lang,
      'language_support'=>$language_support,
      'usertime'=>date("Y-m-d H:i:s"),
      'share'=>'false',
    );
    
    $call=$this->makeApiPostCall("api/queries", $fields);
    $this->debug("[{$call['status']}] {$call['url']}");
    
    $i++;
  }
  
  /**
   * Make browsing request to API
   * @param array $user
   * @param integer $i
   */
  private function makeApiBrowsingRequest($user, &$i) {
    
    $this->debug("> makeApiBrowsingRequest");
    
    $url='http://www.fake-data-generator-'. rand(0, 200) .'.com';
    $domain=parse_url($url, PHP_URL_HOST);
    
    $fields=array(
      'member_id'=>isset($user['member_id'])?$user['member_id']:'',
      'user_id'=>isset($user['user_id'])?$user['user_id']:'',
      'domain'=>$domain,
      'url'=>$url,
      'usertime'=>date("Y-m-d H:i:s"),
    );
    
    $call=$this->makeApiPostCall("api/browsing", $fields);
    $this->debug("[{$call['status']}] {$call['url']}");
    
    $i++;
    
    // also make adtracks request for this browsing request
    $this->makeApiAdTracksRequest($user, $fields, $i);
    
  }
  
  /**
   * Make adtracks request to API
   * @param array $user
   * @param array $browsing Array containing the parent browsing request fields
   * @param integer $i
   */
  private function makeApiAdTracksRequest($user, $browsing, &$i) {
    $this->debug("> makeApiAdTracksRequest");
    
    $demoAdTracks=$this->getDemoAdTracks();
    $status_list=array('allowed','blocked');
    
    $countRange=range(5, 20);
    $adTracksCount=$countRange[array_rand($countRange)];
    $adTracks=array();
    
    for ($a=0; $a<$adTracksCount; $a++) {
      $adTrack=$demoAdTracks[array_rand($demoAdTracks)];
      
      $adTrack['member_id']=isset($user['member_id'])?$user['member_id']:'';
      $adTrack['user_id']=isset($user['user_id'])?$user['user_id']:'';
      $adTrack['domain']=$browsing['domain'];
      $adTrack['usertime']=date("Y-m-d H:i:s");
      $adTrack['status']=$status_list[array_rand($status_list)];
      
      $adTracks[]=$adTrack;
    }
        
    $call=$this->makeApiPostCall("api/adtracks", $adTracks, true);
    $this->debug("[{$call['status']}] {$call['url']}");
        
    $i++;
  }
  
  /**
   * Makes a post call to API command with specific fields
   * @param string $command Example api/browsing
   * @param array $fields List of fields and values to send
   */
  private function makeApiPostCall($command, $fields=array(), $isJson=false) {
  
    //set POST variables
    $url = "{$this->hostInfo}$command";

    //url-ify the data for the POST
    $fields_string=$isJson ? json_encode($fields) : http_build_query($fields);

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    
    //Set the content type to application/json
    if ($isJson) {
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
    }

    //execute post
    $result = curl_exec($ch);
    
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    //close connection
    curl_close($ch);
    
    return array(
        'url'=>$url,
        'fields'=>$fields_string,
        'result'=>$result,
        'status'=>$http_status,
    );
    
  }

  /**
   * Return a list of anonymous and member users to use in the calls
   * $member_id If a member ID was specified, only that one user will be used
   * @return array
   */
  private function getApiUsers($member_id = null) {
    $users = array();
    if ($member_id !== null) {
      $model = Members::model()->findByPk($member_id);
      if ($model) {
        $users[] = array(
            'member_id' => $member_id,
        );
      } else {
        $this->debug("Member with ID $member_id was not found.");
      }
    } else {
      $members = $this->getApiMembers();
      $anonymous_users = $this->getApiAnonymousUsers();
      $users = array_merge($members, $anonymous_users);
    }
    return $users;
  }

  /**
   * Gets a list of registered members to use in the API calls
   * @return type
   */
  private function getApiMembers() {
    $members = array();
    $criteria = new CDbCriteria(array(
        'limit' => $this->apiMembersLimit,
        'order' => 'random()',
    ));
    $models = Members::model()->findAll($criteria);
    foreach ($models as $model) {
      $members[] = array(
          'member_id' => $model->id,
      );
    }
    return $members;
  }

  /**
   * Gets a list of anonymous guids to use in API calls
   * @return array
   */
  private function getApiAnonymousUsers() {
    $cacheKey = 'fakeDataGenerator_apiAnonymousUsers_' . $this->apiUsersLimit;
    $anonymous_users = Yii::app()->cache->get($cacheKey);
    if ($anonymous_users === false) {
      $anonymous_users = array();
      for ($i = 0; $i < $this->apiUsersLimit; $i++) {
        $guid = $this->getGUID();
        $guid = ltrim($guid, "{");
        $guid = rtrim($guid, "}");
        $anonymous_users[] = array(
            'user_id' => $guid,
        );
      }
      Yii::app()->cache->set($cacheKey, $anonymous_users, (60 * 60 * 24 * 30)); // use the same anonymous users for 1 month
    }
    return $anonymous_users;
  }

  /**
   * Generates guid
   * @return string
   */
  private function getGUID() {
    if (function_exists('com_create_guid')) {
      return com_create_guid();
    } else {
      mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
      $charid = strtoupper(md5(uniqid(rand(), true)));
      $hyphen = chr(45); // "-"
      $uuid = chr(123)// "{"
              . substr($charid, 0, 8) . $hyphen
              . substr($charid, 8, 4) . $hyphen
              . substr($charid, 12, 4) . $hyphen
              . substr($charid, 16, 4) . $hyphen
              . substr($charid, 20, 12)
              . chr(125); // "}"
      return $uuid;
    }
  }
  
  /**
   * Provides a list of demo threats data
   * @return array
   */
  private function getDemoAdTracks() {
    $json=<<<EOF
[  
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"Doubleclick",
      "service_url":"http://www.doubleclick.net/",
      "url":"http://googleads.g.doubleclick.net/pagead/viewthroughconversion/965296472/?value=0&guid=ON&script=0",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Content",
      "service_name":"Google",
      "service_url":"http://www.google.com/",
      "url":"http://www.google.com/ads/user-lists/965296472/?script=0&random=40253578",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"Adobe",
      "service_url":"http://www.adobe.com/",
      "url":"http://prisacom.112.2o7.net/b/ss/prisacomelpaiscom,prisacomglobal/1/H.27.4/s58145318133756?AQB=1&ndh=1&t=30%2F2%2F2015%2011%3A19%3A4%201%20-120&fid=47DD0F53B8EDE35E-0F5DCB746530DDA3&ce=UTF-8&ns=prisacom&pageName=elpaiscom%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&g=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&r=http%3A%2F%2Felpais.com%2F&cc=EUR&ch=album&server=elpais.com&events=event2&c1=album%3Esin_subseccion&c3=fotogaleria&v3=D%3DpageName&v4=D%3Dch&c5=D%3Dg&v5=D%3Dc1&c6=D%3Dr&v7=D%3Dc3&c8=lunes&c9=laborable&v10=D%3Dg&c14=espa%C3%B1a&v14=D%3Dc14&c17=web&v17=D%3Dc17&c18=prisa&v18=D%3Dc18&c19=el%20pais&v19=D%3Dc19&c20=elpais.com&v20=D%3Dc20&c21=repeat&v21=D%3Dc21&v22=D%3Dc62&c24=11%3A19%3A04&c30=noticias&v30=D%3Dc30&c31=informacion&v32=D%3Dc33&c33=3&v33=D%3Dc36&c34=W9g%2F8FPWvixLvAG1CGYAAg%3D%3D&c35=11%3A00AM&v35=D%3Dc35&c36=lunes-30%2F03%2F2015-11%3A19%3A04&c39=D%3Dc45&v39=D%3Dc45&v43=D%3Dc34&c45=%20%23autoretrete%2C%20otra%20fotograf%C3%ADa%20%20fotograf%C3%ADa%20%20el%20pa%C3%ADs&v45=D%3Dc45&v48=D%3Dc8&c57=D%3D%22con_mp4-%22%2BUser-Agent&v57=D%3D%22con_mp4-%22%2BUser-Agent&v59=D%3Dc24&c60=Less%20than%201%20day&v60=D%3Dc60&c62=an%C3%B3nimo&v62=D%3Dc31&v63=D%3Dr&v66=D%3Dc9&h1=D%3Dc18%2B%22%3E%22%2Bc19%2B%22%3E%22%2Bc20%2B%22%3E%22%2Bc1%2B%22%3E%22pageName&l1=15634%3B39560%3B75097%3B23903%3B32893%3B139838%3B81629%3B15680%3B83898%3B73668%3B75114%3B39730%3B75111&s=1920x1080&c=24&j=1.6&v=Y&k=Y&bw=1920&bh=955&p=Widevine%20Content%20Decryption%20Module%3BShockwave%20Flash%3BChrome%20Remote%20Desktop%20Viewer%3BNative%20Client%3BChrome%20PDF%20Viewer%3BJava%20Deployment%20Toolkit%206.0.290.11%3BJava%28TM%29%20Platform%20SE%206%20U29%3BMicrosoft%20Office%202010%3BVLC%20Web%20Plugin%3BWinamp%20Application%20Detector%3BiTunes%20Application%20Detector%3BFacebook%20Video%20Calling%20Plugin%3BGoogle%20Update%3BGoogle%20Talk%20Plugin%3BGoogle%20Talk%20Plugin%20Video%20Renderer%3B&pid=elpaiscom&pidt=1&oid=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&ot=A&AQE=1",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"Google",
      "service_url":"http://www.google.com/",
      "url":"http://tpc.googlesyndication.com/safeframe/1-0-2/html/container.html",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Content",
      "service_name":"Visual Revenue",
      "service_url":"http://visualrevenue.com/",
      "url":"http://t1.visualrevenue.com/?idsite=255&url=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&seen_url=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&t=%23autoRetrete%2C%20otra%20fotograf%C3%ADa%20%7C%20Fotograf%C3%ADa%20%7C%20EL%20PA%C3%8DS&c=1427706906063gANVW9VoojDzaNWSM862LXSQB6T7iMvh&r=1427707144309&ypos=2&debug=loadTime.7&zone=Caja%2520libre%252011&refurl=http%3A%2F%2Felpais.com%2F&refnp=255&norm_refurl=http%3A%2F%2Felpais.com%2F&content_type=utf8&mx=996&my=1201&sw=1903&v=15",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"Doubleclick",
      "service_url":"http://www.doubleclick.net/",
      "url":"http://pubads.g.doubleclick.net/gampad/ads?gdfp_req=1&correlator=1062864653647872&output=json_html&callback=callbackProxy&impl=fif&sfv=1-0-2&iu=%2F7811748%2Felpais_web%2Ffotogalerias%2Felpais%2Fldb1&sz=728x90%7C980x90&scp=pos%3Dldb1&cust_params=pbskey%3Darte_a%252Cindustria_a%252Ctelecomunicaciones_a%252Ccomunicaciones_a%252Cfotografia_a%252Caplicaciones_moviles_a%252Caplicaciones_informaticas_a%252Cartes_plasticas_a%252Ctelefonia_movil_multimedia_a%252Csoftware_a%252Ctelefonia_movil_a%252Cinformatica_a%252Ctelefonia_a%252C1427572061_534719%252Carticuloportada%252Cpbs0%26au%3Delpais_web%252Ffotogalerias%252Felpais%26fpd%3Dfpt&cookie=ID%3Ddc8e4218246572b4%3AT%3D1416277041%3AS%3DALNI_MaEyQdNveAlTqS-bOeFUfUxweDC0g&lmt=1427707144&dt=1427707144349&cc=24&frm=20&biw=1920&bih=955&oid=3&adx=0&ady=0&adk=1821097935&gut=v2&ifi=1&u_tz=120&u_his=7&u_java=true&u_h=1080&u_w=1920&u_ah=1040&u_aw=1920&u_cd=24&u_nplug=16&u_nmime=97&u_sd=1&flash=17.0.0&url=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&ref=http%3A%2F%2Felpais.com%2F&vrg=58&vrp=58&ga_vid=647845126.1427707144&ga_sid=1427707144&ga_hid=1865270500",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Content",
      "service_name":"Google",
      "service_url":"http://www.google.com/",
      "url":"http://www.google.es/ads/user-lists/965296472/?script=0&random=40253578&ipr=y",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Social",
      "service_name":"Twitter",
      "service_url":"https://twitter.com/",
      "url":"http://urls.api.twitter.com/1/urls/count.json?url=http://elpais.com/elpais/2015/03/28/album/1427572061_534719.html&callback=GlobRecvCount.twitter[0].recvCount",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Social",
      "service_name":"Facebook",
      "service_url":"http://www.facebook.com/",
      "url":"https://api.facebook.com/method/fql.query?query=select%20total_count%20from%20link_stat%20where%20url=%22http://elpais.com/elpais/2015/03/28/album/1427572061_534719.html%22&format=json&callback=GlobRecvCount.facebook[0].recvCount",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Social",
      "service_name":"LinkedIn",
      "service_url":"http://www.linkedin.com/",
      "url":"http://www.linkedin.com/countserv/count/share?url=http://elpais.com/elpais/2015/03/28/album/1427572061_534719.html&callback=GlobRecvCount.linkedIn[0].recvCount",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"cXense",
      "service_url":"http://www.cxense.com/",
      "url":"http://cdn.cxense.com/p1.html#ver=1&typ=pgv&rnd=i7vnyz80wr2d281v&acc=0&sid=9222334054942283911&loc=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&ref=http%3A%2F%2Felpais.com%2F&gol=&pgn=&ltm=1427707144656&new=0&arf=0&tzo=-120&res=1920x1080&dpr=1&col=24&jav=1&bln=es&cks=i7vnyzfkbpfggns7&ckp=i2mmqclcfdor6d7w&chs=UTF-8&wsz=1920x955&altm=1422495748276&arnd=i5hh8o1fyjyr2y7f&aatm=68&axtl=&awsz=1672x927&amvw=1672x3027&fls=1&flv=Shockwave%20Flash%2017.0%20r0",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Analytics",
      "service_name":"comScore",
      "service_url":"http://www.comscore.com/",
      "url":"http://b.scorecardresearch.com/r?c2=8671776&d.c=gif&d.o=prisacomelpaiscom&d.x=250651583&d.t=page&d.u=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:04",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Social",
      "service_name":"LinkedIn",
      "service_url":"http://www.linkedin.com/",
      "url":"https://www.linkedin.com/countserv/count/share?url=http://elpais.com/elpais/2015/03/28/album/1427572061_534719.html&callback=GlobRecvCount.linkedIn[0].recvCount",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:05",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"cXense",
      "service_url":"http://www.cxense.com/",
      "url":"http://cdn.cxense.com/cx.js",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:05",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"cXense",
      "service_url":"http://www.cxense.com/",
      "url":"http://p1cluster.cxense.com/p1.js",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:05",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"cXense",
      "service_url":"http://www.cxense.com/",
      "url":"http://comcluster.cxense.com/Repo/rep.gif?ver=1&typ=pgv&rnd=i7vnyz80wr2d281v&acc=0&sid=9222334054942283911&loc=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&ref=http%3A%2F%2Felpais.com%2F&gol=&pgn=&ltm=1427707144656&new=0&arf=0&tzo=-120&res=1920x1080&dpr=1&col=24&jav=1&bln=es&cks=i7vnyzfkbpfggns7&ckp=i2mmqclcfdor6d7w&chs=UTF-8&wsz=1920x955&altm=1422495748276&arnd=i5hh8o1fyjyr2y7f&aatm=68&axtl=&awsz=1672x927&amvw=1672x3027&fls=1&flv=Shockwave%20Flash%2017.0%20r0&cst=6b9af3167812c5b41839c9a4b629e975&lst=65980b828ddea4a7855fcc74c6da39d3",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:06",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"Adobe",
      "service_url":"http://www.adobe.com/",
      "url":"http://prisacom.112.2o7.net/b/ss/prisacomelpaiscom,prisacomglobal/1/H.27.4/s56398201677948?AQB=1&ndh=1&t=30%2F2%2F2015%2011%3A19%3A12%201%20-120&fid=47DD0F53B8EDE35E-0F5DCB746530DDA3&ce=UTF-8&ns=prisacom&pageName=elpaiscom&g=http%3A%2F%2Felpais.com%2F&r=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&cc=EUR&ch=home&server=elpais.com&events=event2&c1=home&c3=portada&v3=D%3DpageName&v4=D%3Dch&c5=D%3Dg&v5=D%3Dc1&c6=D%3Dr&v7=D%3Dc3&c8=lunes&c9=laborable&v10=D%3Dg&c14=espa%C3%B1a&v14=D%3Dc14&c17=web&v17=D%3Dc17&c18=prisa&v18=D%3Dc18&c19=el%20pais&v19=D%3Dc19&c20=elpais.com&v20=D%3Dc20&c21=repeat&v21=D%3Dc21&v22=D%3Dc62&c24=11%3A19%3A12&c30=noticias&v30=D%3Dc30&c31=informacion&v32=D%3Dc33&c33=3&v33=D%3Dc36&c34=W9g%2F8FPWvixLvAG1CGYAAg%3D%3D&c35=11%3A00AM&v35=D%3Dc35&c36=lunes-30%2F03%2F2015-11%3A19%3A12&v43=D%3Dc34&c45=el%20pa%C3%ADs%3A%20el%20peri%C3%B3dico%20global&v45=D%3Dc45&v48=D%3Dc8&c57=D%3D%22con_mp4-%22%2BUser-Agent&v57=D%3D%22con_mp4-%22%2BUser-Agent&v59=D%3Dc24&c60=Less%20than%201%20day&v60=D%3Dc60&c62=an%C3%B3nimo&v62=D%3Dc31&v63=D%3Dr&v66=D%3Dc9&h1=D%3Dc18%2B%22%3E%22%2Bc19%2B%22%3E%22%2Bc20%2B%22%3E%22%2Bc1%2B%22%3E%22pageName&s=1920x1080&c=24&j=1.6&v=Y&k=Y&bw=1920&bh=955&p=Widevine%20Content%20Decryption%20Module%3BShockwave%20Flash%3BChrome%20Remote%20Desktop%20Viewer%3BNative%20Client%3BChrome%20PDF%20Viewer%3BJava%20Deployment%20Toolkit%206.0.290.11%3BJava%28TM%29%20Platform%20SE%206%20U29%3BMicrosoft%20Office%202010%3BVLC%20Web%20Plugin%3BWinamp%20Application%20Detector%3BiTunes%20Application%20Detector%3BFacebook%20Video%20Calling%20Plugin%3BGoogle%20Update%3BGoogle%20Talk%20Plugin%3BGoogle%20Talk%20Plugin%20Video%20Renderer%3B&pid=elpaiscom%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&pidt=1&oid=http%3A%2F%2Felpais.com%2F&ot=A&AQE=1",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:12",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"Doubleclick",
      "service_url":"http://www.doubleclick.net/",
      "url":"http://googleads.g.doubleclick.net/pagead/viewthroughconversion/965296472/?value=0&guid=ON&script=0",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:12",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"Google",
      "service_url":"http://www.google.com/",
      "url":"http://tpc.googlesyndication.com/safeframe/1-0-2/html/container.html",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:12",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Advertising",
      "service_name":"Doubleclick",
      "service_url":"http://www.doubleclick.net/",
      "url":"http://pubads.g.doubleclick.net/gampad/ads?gdfp_req=1&correlator=556352936083456&output=json_html&callback=googletag.impl.pubads.setAdContentsBySlotForSync&impl=ss&json_a=1&eid=108809022&sfv=1-0-2&iu_parts=7811748%2Celpais_web%2Cportada%2Cldb1%2Cskin%2Cinter%2Cmpu1%2Cmpu5%2Cldb5%2Cmpu4%2Cldb4%2Cmpu3%2Cldb3%2Cmpu2%2Cldb2%2Cnstd1%2Cnstd2%2Cnstd3%2Cnstd4%2Cnstd5%2Cnstd6%2Cnstd7&enc_prev_ius=%2F0%2F1%2F2%2F3%2C%2F0%2F1%2F2%2F4%2C%2F0%2F1%2F2%2F5%2C%2F0%2F1%2F2%2F6%2C%2F0%2F1%2F2%2F7%2C%2F0%2F1%2F2%2F8%2C%2F0%2F1%2F2%2F9%2C%2F0%2F1%2F2%2F10%2C%2F0%2F1%2F2%2F11%2C%2F0%2F1%2F2%2F12%2C%2F0%2F1%2F2%2F13%2C%2F0%2F1%2F2%2F14%2C%2F0%2F1%2F2%2F15%2C%2F0%2F1%2F2%2F16%2C%2F0%2F1%2F2%2F17%2C%2F0%2F1%2F2%2F18%2C%2F0%2F1%2F2%2F19%2C%2F0%2F1%2F2%2F20%2C%2F0%2F1%2F2%2F21&prev_iu_szs=728x90%7C980x90%2C1x1%2C1x1%2C300x250%7C400x400%7C300x600%7C400x600%2C300x250%7C400x400%2C980x90%2C300x250%7C400x400%2C980x90%2C300x250%7C400x400%2C728x90%7C980x90%2C300x250%7C400x400%2C980x90%2C1x1%2C1x1%2C1x1%2C1x1%2C1x1%2C1x1%2C1x1&ists=196735&prev_scp=pos%3Dldb1%7Cpos%3Dskin%7Cpos%3Dinter%7Cpos%3Dmpu1%7Cpos%3Dmpu5%7Cpos%3Dldb5%7Cpos%3Dmpu4%7Cpos%3Dldb4%7Cpos%3Dmpu3%7Cpos%3Dldb3%7Cpos%3Dmpu2%7Cpos%3Dldb2%7Cpos%3Dnstd1%7Cpos%3Dnstd2%7Cpos%3Dnstd3%7Cpos%3Dnstd4%7Cpos%3Dnstd5%7Cpos%3Dnstd6%7Cpos%3Dnstd7&cust_params=au%3Delpais_web%252Fportada%26fpd%3Dfpt&cookie=ID%3Ddc8e4218246572b4%3AT%3D1416277041%3AS%3DALNI_MaEyQdNveAlTqS-bOeFUfUxweDC0g&lmt=1427707152&dt=1427707152412&frm=20&biw=1920&bih=955&oid=3&adks=1323160908%2C408400820%2C904248918%2C3784443502%2C3128475658%2C3464791955%2C3579922471%2C2702372956%2C299757925%2C3896567376%2C3805045264%2C2729542637%2C166344952%2C2513502198%2C3963591399%2C1215443419%2C3017615904%2C3615740521%2C2307404152&gut=v2&ifi=1&u_tz=120&u_his=8&u_java=true&u_h=1080&u_w=1920&u_ah=1040&u_aw=1920&u_cd=24&u_nplug=16&u_nmime=97&u_sd=1&flash=17.0.0&url=http%3A%2F%2Felpais.com%2F&ref=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&vrg=58&vrp=58&ga_vid=54622076.1427707152&ga_sid=1427707152&trunc=1",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:12",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Content",
      "service_name":"Visual Revenue",
      "service_url":"http://visualrevenue.com/",
      "url":"http://p.visualrevenue.com/?transport=jsonp&idsite=255&url=http%3A%2F%2Felpais.com%2F&content_type=utf8&callback=_vrq.jsonp.callbackFn",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:12",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Content",
      "service_name":"Visual Revenue",
      "service_url":"http://visualrevenue.com/",
      "url":"http://t1.visualrevenue.com/?idsite=255&url=http%3A%2F%2Felpais.com%2F&seen_url=http%3A%2F%2Felpais.com%2F&t=EL%20PA%C3%8DS%3A%20el%20peri%C3%B3dico%20global&c=1427706906063gANVW9VoojDzaNWSM862LXSQB6T7iMvh&r=1427707152440&ypos=0&debug=loadTime.3&zone=Caja%2520libre%252011&refurl=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&refnp=255&norm_refurl=http%3A%2F%2Felpais.com%2Felpais%2F2015%2F03%2F28%2Falbum%2F1427572061_534719.html&content_type=utf8&mx=502&my=144&sw=1903&v=15",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:12",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Content",
      "service_name":"Google",
      "service_url":"http://www.google.com/",
      "url":"http://www.google.com/ads/user-lists/965296472/?script=0&random=4070611021",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:12",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Analytics",
      "service_name":"comScore",
      "service_url":"http://www.comscore.com/",
      "url":"http://b.scorecardresearch.com/r?c2=8671776&d.c=gif&d.o=prisacomelpaiscom&d.x=94800438&d.t=page&d.u=http%3A%2F%2Felpais.com%2F",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:12",
      "status":"allowed"
   },
   {  
      "member_id":"6",
      "user_id":"",
      "category":"Content",
      "service_name":"Google",
      "service_url":"http://www.google.com/",
      "url":"http://www.google.es/ads/user-lists/965296472/?script=0&random=4070611021&ipr=y",
      "domain":"elpais.com",
      "usertime":"2015-03-30 09:19:12",
      "status":"allowed"
   }
]
EOF;
    $decoded=json_decode(trim($json), true);
    foreach ($decoded as &$d) {
      unset($d['member_id']);
      unset($d['user_id']);
      unset($d['domain']);
      unset($d['usertime']);
      unset($d['status']);
    }
    return $decoded;
  }

}
