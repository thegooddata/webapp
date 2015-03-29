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
        $this->makeApiRequestsForUser($user, $requests_per_user);
      }
    } else {
      $this->debug("No users, quitting.");
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
  
  private function makeApiQueriesRequest($user, &$i) {
    
    
    /**
     * ------WebKitFormBoundaryAlYJgCpeUD2elHLc
Content-Disposition: form-data; name="member_id"

0
------WebKitFormBoundaryAlYJgCpeUD2elHLc
Content-Disposition: form-data; name="user_id"

34210f86-bb74-4e1d-8864-9ac07a30daca
------WebKitFormBoundaryAlYJgCpeUD2elHLc
Content-Disposition: form-data; name="provider"

google
------WebKitFormBoundaryAlYJgCpeUD2elHLc
Content-Disposition: form-data; name="data"

php+curl+post+call
------WebKitFormBoundaryAlYJgCpeUD2elHLc
Content-Disposition: form-data; name="query"

https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=php+curl+post+call
------WebKitFormBoundaryAlYJgCpeUD2elHLc
Content-Disposition: form-data; name="lang"

es
------WebKitFormBoundaryAlYJgCpeUD2elHLc
Content-Disposition: form-data; name="usertime"

2015-03-29 11:02:43
------WebKitFormBoundaryAlYJgCpeUD2elHLc
Content-Disposition: form-data; name="share"

false
------WebKitFormBoundaryAlYJgCpeUD2elHLc
Content-Disposition: form-data; name="language_support"

false
------WebKitFormBoundaryAlYJgCpeUD2elHLc--
     */
    
    
    $this->debug("> makeApiQueriesRequest");
    $i++;
  }
  
  private function makeApiBrowsingRequest($user, &$i) {
    
    $url='http://www.example.com';
    $domain=parse_url($url, PHP_URL_HOST);
    
    $fields=array(
      'member_id'=>isset($user['member_id'])?$user['member_id']:'',
      'user_id'=>isset($user['user_id'])?$user['user_id']:'',
      'domain'=>$domain,
      'url'=>$url,
      'usertime'=>date("Y-m-d H:i:s"),
    );
    
    $this->debug("> makeApiBrowsingRequest");
    print_r($fields);
    
    $this->makeApiPostCall("api/browsing", $fields);
    
    $i++;
    $this->makeApiAdTracksRequest($user, $i);
  }
  
  private function makeApiAdTracksRequest($user, &$i) {
    $this->debug("> makeApiAdTracksRequest");
    $i++;
  }
  
  /**
   * Makes a post call to API command with specific fields
   * @param string $command Example api/browsing
   * @param array $fields List of fields and values to send
   */
  private function makeApiPostCall($command, $fields=array()) {
  
    //set POST variables
    $url = "{$this->hostInfo}$command";

    //url-ify the data for the POST
    $fields_string='';
    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    //execute post
    $result = curl_exec($ch);
    
    print_r($result);

    //close connection
    curl_close($ch);
    
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

}
