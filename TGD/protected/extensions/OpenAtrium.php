<?php

class OpenAtrium extends CApplicationComponent {
  
  public $host='https://collaborate.thegooddata.org';
  public $adminLogin='tgdAdmin';
  public $adminPassword = 'tGdOA2346';
  
  // public $host='http://openatrium.heavydots.com';
  // public $adminLogin='admin';
  // public $adminPassword = 'admin007';
  
  public function createUser($userName, $userPassword, $userEmail, $userScreenName, &$oa_errors) {
    
	  $host = $this->host;
    $adminLogin = $this->adminLogin;
    $adminPassword = $this->adminPassword;
    
    /*
    * Server REST - user.login
    */
    // REST Server URL
    $request_url = $host.'/rest/user/login';
    
    // User data
    $user_data = array(
      'username' => /*admin login*/$adminLogin,
      'password' => /*admin password*/$adminPassword,
    );
    $user_data = json_encode($user_data);
    
    /////////////////// LOGIN //////////////////////////////////////////////////
    
    // cURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $request_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', "Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, 1); // Do a regular HTTP POST
    curl_setopt($curl, CURLOPT_POSTFIELDS, $user_data); // Set POST data
    curl_setopt($curl, CURLOPT_HEADER, FALSE);  // Ask to not return Header
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_FAILONERROR, TRUE);
    $response = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    // Check if login was successful
    if ($http_code == 200) {
      // Convert json response as array
      $logged_user = json_decode($response);
    }
    else {
      // Get error msg
      $http_message = curl_error($curl);
      //die($http_message);
      $oa_errors[]="Could not login to OpenAtrium. ($http_message)";
      return false;
    }
    // Define cookie session
    $cookie_session = $logged_user->session_name . '=' . $logged_user->sessid;
    //GET CSRF TOKEN
    $csrf_token = $logged_user->token;
    
    
    
    ///////////////////////// CREATE ///////////////////////////////////////////
    
    /*
    * Server REST - user.create
    */
    // REST Server URL
    $request_url = $host.'/rest/user/register';
    // User data
    $user_data = array(
      'name' => /*user name*/ $userName,
      'pass' => /*password*/ $userPassword,
      'mail' => /*email*/ $userEmail,
      'status' => 1,
      //'roles'=>array(
      //  4,
      //),
      'field_user_display_name' => array(
        'und' => array (
            0 => array (
                'value' => /*screen name*/ $userScreenName,
                'format' => NULL,
                'safe_value' => /*screen name*/ $userScreenName,
            ),
        ),
      ),
    );
    
    //print_r($user_data);
    
    $user_data = json_encode($user_data);
    
    // cURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $request_url);
    curl_setopt($curl, CURLOPT_POST, TRUE); // Do a regular HTTP POST
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', "Content-type: application/json", 'X-CSRF-Token: '.$csrf_token));
    curl_setopt($curl, CURLOPT_POSTFIELDS, $user_data); // Set POST data
    curl_setopt($curl, CURLOPT_HEADER, false);  // Ask to not return Header
    curl_setopt($curl, CURLOPT_COOKIE, "$cookie_session"); // use the previously saved session
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_FAILONERROR, FALSE); //True in prod, false for debugging
    $response = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
    //echo($response);
    
    // Check if login was successful
    if ($http_code == 200) {
      //echo '1';
      // Convert json response as array
      $user = json_decode($response, true);
      //echo $user;
    }
    else {
      //echo '2';
      // Get error msg
      $http_message = curl_error($curl);
      //die($http_message);
      //echo strlen($http_message);
      if (strlen(trim($http_message))) {
        $oa_errors[]=$http_message;
      } else {
        $user = json_decode($response, true);
      }
    }
    
    //var_dump($response);
    //var_dump($user);
    
    if (isset($user)) {
      
      $uid=null;
      
      if (isset($user['uid'])) {
        $uid=$user['uid'];
      }
      
      //print_r($user);
      if (isset($user['form_errors']) && is_array($user['form_errors'])) {
        foreach ($user['form_errors'] as $k => $v) {
          $oa_errors[]=strip_tags($v);
        }
      }
      
      
      if ($uid!==null) {
        // echo 'we got uid: '.$uid;
      }
      
    }
    
    //echo 'errors:<br >';
    //print_r($oa_errors);
    
    if (count($oa_errors)==0) {
      return true;
    }
    
    return false;
	}
}