<?php

class ApiController extends Controller
{
    // Members
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers 
     */
    Const APPLICATION_ID = 'ASCCPE';
 
    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';
    /**
     * @return array action filters
     */
    public function filters()
    {
            return array();
    }
    
    /**
     * TODO: Not that important but we could delete all settings that are not 
     * in ExtensionSettings::getAllowedKeys() list so we don't keep deprecated 
     * settings.
     */
    public function actionSaveUserSettings() {
      $result=array(
        'success'=>true,
        'errors'=>array(),
      );
      if (Yii::app()->user->isGuest) {
        $result['errors'][]='User is not logged in.';
      } else {
        foreach ($_POST as $key => $value) {
          if (in_array($key, ExtensionSettings::getAllowedKeys())) {
            if (!ExtensionSettings::setUserSetting(Yii::app()->user->id, $key, $value)) {
              $result['errors'][]="Setting '$key' could not be saved.";
            }
          } else {
            $result['errors'][]="Setting with name '$key' is not in the list of allowed items.";
          }
        }
      }
      if (count($result['errors'])) {
        $result['success']=false;
      }
		  $this->_sendResponse(200, CJSON::encode($result),'application/json');
    }
    
    public function actionLogin() {
      
      // force loading user module
      Yii::app()->getModule('user');
      
      $model=new UserLogin;
      $result=array(
        'success'=>0,
        'errors'=>array(),
        'post'=>$_POST
      );
      if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				if($model->validate()) {
					$result['success']=1;
				} else {
				  if ($model->hasErrors()) {
            foreach ($model->getErrors() as $error) {
              foreach ($error as $e) {
                $result['errors'][]=$e;
              }
            }
          }
				}
			}
			$this->_sendResponse(200, CJSON::encode($result),'application/json');
    }
    
    private function logActiveUser() {
      ActiveUsers::logActiveUser(Yii::app()->request->getPost("user_id"));
    }
    
    public function actionGetLoggedUser() {
      $this->logActiveUser(); // log active user on extension
      $result=array();
      if (!Yii::app()->user->isGuest) {
        $result = Yii::app()->db->createCommand()
        ->select('u.id, u.username')
        ->from('tbl_members u')
        ->where(array(
                    'and',
                    'u.id = :id',
                    ),
            array(
                    ':id'=>Yii::app()->user->id,
                    )
            )
        ->queryRow();
        // get user settings
        $result['settings']=ExtensionSettings::getUserSettings(Yii::app()->user->id);
      }
		  $this->_sendResponse(200, CJSON::encode($result),'application/json');
    }

    public function actionUser(){
    	
    	$value = $_GET['username'];
    	$password = $_GET['password'];

    	$user = Yii::app()->db->createCommand()
			                ->setFetchMode(PDO::FETCH_OBJ)
			                ->select('*')
			                ->from('tbl_members u')
			                ->where(array(
			                            'and',
			                            '(UPPER(u.username) = :value or UPPER(u.email) = :value)',
			                            'u.password = :password'),
			                    array(
			                            ':value'=>strtoupper($value),
			                            ':password'=>$password)
			                    )
			                ->queryAll();

		if(empty($user)) {
	         $this->_sendResponse(404, 'No user found with username: '.$_GET['username']);
	    } else {
	    	$objUser = User::model()->findByPk($user[0]->id);
			$objUser->lastvisit_at = date('Y-m-d H:i:s');
			$objUser->save();
	    	
	        $this->_sendResponse(200, CJSON::encode($user),'application/json');
	    }             
    }
 	
 	// Actions
    public function actionDeleteQueries()
	{
		$user_id=$_GET['user_id'];
		$member_id=$_GET['user_id'];

		if (!is_numeric($_GET['user_id'])){
			$member_id=0;
		}

		if ($member_id!=0)
		{

			$query = "delete from tbl_queries  where member_id = :member_id";
			$command = Yii::app()->db->createCommand($query);
			$resultado=$command->execute(array('member_id' => $member_id));

			if ($resultado==0)
				$this->_sendResponse(200, CJSON::encode('0'),'application/json');
			else
				$this->_sendResponse(200, CJSON::encode($resultado),'application/json');
			
		}
		else
		{
			$query = "delete from tbl_queries  where user_id = :user_id";
			$command = Yii::app()->db->createCommand($query);
			$resultado=$command->execute(array('user_id' => $user_id));

			if ($resultado==0)
				$this->_sendResponse(200, CJSON::encode('0'),'application/json');
			else
				$this->_sendResponse(200, CJSON::encode($resultado),'application/json');
		}



	}

 	// Actions
    public function actionCount()
	{
		switch($_GET['model'])
	    {	
	    	case 'loans':
	            $models = Loans::model()->findAll();
	            break;
            case 'queries':
            	$models = $this->_countQueries();
            	break;

    		default:
	            // Model not implemented error
	            $this->_sendResponse(501, sprintf(
	                'Error: Mode <b>list</b> is not implemented for model <b>%s</b>',
	                $_GET['model']) );
	            Yii::app()->end();
	    }

        // Prepare response
        if (is_array($models))
        {
        	$rows = array();
	        foreach($models as $model)
	            $rows[] = $model->attributes;
	        // Send the response
	        $this->_sendResponse(200, CJSON::encode((string)count($rows)),'application/json');
    	}
    	else
    	{
    		// Send the response
    		$rows = array();
    		$this->_sendResponse(200, CJSON::encode((string)$models),'application/json');
    	}

	}

	public function _countQueries(){
		$user_id=$_GET['user_id'];
		$member_id=$_GET['user_id'];

		if (!is_numeric($_GET['user_id'])){
			$member_id=-1;
		}

		$datas = Yii::app()->db->createCommand()
			                ->setFetchMode(PDO::FETCH_OBJ)
			                ->select('count(*)')
			                ->from('tbl_queries')
			                ->where(array(
			                            'and',
			                            '(user_id = :user_id or member_id = :member_id)',
			                            'share = :share'
			                            ),
					                    array(
				                            'user_id'=>$user_id,
				                            'member_id'=>$member_id,
				                            'share'=>'true')
					                    )
			                ->queryAll();

		return $datas[0]->count;
	}


	public function actionPercentil()
	{
		switch($_GET['model'])
	    {	
            case 'queries':
            	$data = $this->_percentileQueries();
            	break;

    		default:
	            // Model not implemented error
	            $this->_sendResponse(501, sprintf(
	                'Error: Mode <b>list</b> is not implemented for model <b>%s</b>',
	                $_GET['model']) );
	            Yii::app()->end();
	    }
	    // Did we get some results?
	    if(empty($data)) {
	        // No
	   		$this->_sendResponse(200, CJSON::encode('0'),'application/json');
	     } else {
	     	// { "level" : "levelName", "value" : x }
	        $this->_sendResponse(200, CJSON::encode($data),'application/json');
	    }
	}

	public function _percentileQueries()
	{
		// returns an array with the format
		// array('level' => 'levelName', 'value' => value)
		return ADbHelper::getSeniorityLevelAndPercentile($_GET['user_id']);
	}
    // Actions
    public function actionList()
	{
		//die($_GET['model']);
	    // Get the respective model instance
	    switch($_GET['model'])
	    {	
	    	 case 'loans':
	            $models = Loans::model()->findAll();
	            break;
    		case 'achievements':
    			$models = $this->_listAchievements();
    			 break;
            case 'users':
	            $models = Users::model()->findAll();
	            break;
            case 'categories':
	            $models = Categories::model()->findAll();
	            break;
            case 'browsing':
	            $models = Browsing::model()->findAll();
	            break;
            case 'queries':
	            $models = Queries::model()->findAll();
	            break;
            case 'adtracks':
	            $models = Adtracks::model()->findAll();
	            break;
            case 'adtrackssources':
	            $models = AdtracksSources::model()->findAll();
	            break;
            case 'queriesBlacklist':
	            $models = QueriesBlacklist::model()->findAll();
	            break;
	        default:
	            // Model not implemented error
	            $this->_sendResponse(501, sprintf(
	                'Error: Mode <b>list</b> is not implemented for model <b>%s</b>',
	                $_GET['model']) );
	            Yii::app()->end();
	    }
	    // Did we get some results?
	    if(empty($models)) {
	        // No
	        $rows = array();
	        $this->_sendResponse(200, CJSON::encode($rows),'application/json');
        } else {
	        // Prepare response
	        $rows = array();
	        foreach($models as $model)
	            $rows[] = $model->attributes;
	        // Send the response
	        $this->_sendResponse(200, CJSON::encode($rows),'application/json');
	    }
	}

    public function actionView()
	{
	    // Check if id was submitted via GET
	    // if(!isset($_GET['id']) && !isset($_GET['id']))
	    //     $this->_sendResponse(500, 'Error: Parameter <b>id</b> is missing' );
	 
	    switch($_GET['model'])
	    {
	        case 'users':
	            $model = Users::model()->findByPk($_GET['id']);
				break;
            case 'categories':
	            $model = Categories::model()->findByPk($_GET['id']);
	            break;
            case 'browsing':
	            $model = Browsing::model()->findByPk($_GET['id']);
	            break;
            case 'queries':
	            $model = Queries::model()->findByPk($_GET['id']);
	            break;
            case 'adtracks':
	            $model = Adtracks::model()->findByPk($_GET['id']);
	            break;
            case 'adtrackssources':
	            $model = AdtracksSources::model()->findByPk($_GET['id']);
	            break;
            case 'whitelists':
	            $model = $this->_viewWhitelist();
	            break;
	        case 'blacklist':
	            $model = $this->_viewBlacklist();
	            break;	            
	       	case 'queriesblacklist':
	       		$model = $this->_viewQueriesblacklist();
	       		break;
       		case 'languagesSupport':
       			$model = LanguagesSupport::model()->findByAttributes(
				    array('lang'=>$_GET['query'])
				);
				break;
	            
	       	default:
	            $this->_sendResponse(501, sprintf(
	                'Mode <b>view</b> is not implemented for model <b>%s</b>',
	                $_GET['model']) );
	            Yii::app()->end();
	    }


	    // Did we find the requested model? If not, raise an error
	    if(is_null($model))
	        $this->_sendResponse(404, 'No Item found with id '.$_GET['id']);
	    else
	        $this->_sendResponse(200, CJSON::encode($model),'application/json');
	}

    public function actionCreate()
	{
	    switch($_GET['model'])
	    {
	        // Get an instance of the respective model
	        case 'users':
	            $model = new Users;  
	            break;
            case 'categories':
	            $model = new Categories;  
	            break;
            case 'browsing':
	            $model = new Browsing;  
	            break;
            case 'queries':
	            $model = new Queries;  
	            break;
            case 'adtracks':
	            $model = new Adtracks;  
	            break;
            case 'adtrackssources':
	            $model = new AdtracksSources;  
	            break;
            case 'posts':
	            $model = new Post;                    
	            break;
	        default:
	            $this->_sendResponse(501, 
	                sprintf('Mode <b>create</b> is not implemented for model <b>%s</b>',
	                $_GET['model']) );
	                Yii::app()->end();
	    }

	    // Try to assign POST values to attributes

        // Special handling for AdTracks
	    if ($_GET['model'] == 'adtracks'){
          
            $adtracks_to_create=array();
            $adtracks_created=array();
            
            // maintain backwards compatibility with earlier version of extension that sends adtracks by post one by one
            if (count($_POST)) { 
              $adtracks_to_create[]=$_POST;
            } else {
              // retrieve array of multiple adtracks send to the API as JSON
              $data = file_get_contents('php://input');
              $data = json_decode($data, true);
              if (is_array($data)) {
                $adtracks_to_create=$data;
              }
            }
            
            if (count($adtracks_to_create)) {
              foreach ($adtracks_to_create as $params) {
                  $model=$this->_createAdtrack($params);
                  if ($model->save()) {
                    $adtracks_created[]=$model;
                  } else {
                    // Errors occurred
                    $msg = "<h1>Error</h1>";
                    $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
                    $msg .= "<ul>";
                    foreach($model->errors as $attribute=>$attr_errors) {
                        $msg .= "<li>Attribute: $attribute</li>";
                        $msg .= "<ul>";
                        foreach($attr_errors as $attr_error)
                            $msg .= "<li>$attr_error</li>";
                        $msg .= "</ul>";
                    }
                    $msg .= "</ul>";
                    Yii::log($msg,CLogger::LEVEL_ERROR);
                    $this->_sendResponse(500, $msg );
                }
              }
            }
            
            $this->_sendResponse(200, CJSON::encode($adtracks_created),'application/json');
            
		}
	    else {
			
			foreach($_POST as $var=>$value) {
		        // Does the model have this attribute? If not raise an error
		        if($model->hasAttribute($var))
		            $model->$var = $value;
		        else
		            $this->_sendResponse(500, 
		                sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var,
		                $_GET['model']) );
		    }
	    }

	    // Try to save the model
	    if($model->save())
	        $this->_sendResponse(200, CJSON::encode($model),'application/json');
	    else {
	        // Errors occurred
	        $msg = "<h1>Error</h1>";
	        $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
	        $msg .= "<ul>";
	        foreach($model->errors as $attribute=>$attr_errors) {
	            $msg .= "<li>Attribute: $attribute</li>";
	            $msg .= "<ul>";
	            foreach($attr_errors as $attr_error)
	                $msg .= "<li>$attr_error</li>";
	            $msg .= "</ul>";
	        }
	        $msg .= "</ul>";
	        Yii::log($msg,CLogger::LEVEL_ERROR);
	        $this->_sendResponse(500, $msg );
	    }
	}

    public function actionUpdate()
	{
	    // Parse the PUT parameters. This didn't work: parse_str(file_get_contents('php://input'), $put_vars);
	    $json = file_get_contents('php://input'); //$GLOBALS['HTTP_RAW_POST_DATA'] is not preferred: http://www.php.net/manual/en/ini.core.php#ini.always-populate-raw-post-data
	    $put_vars = CJSON::decode($json,true);  //true means use associative array
	 
	    switch($_GET['model'])
	    {
	        // Find respective model
	        
	        case 'users':
	            $models = Users::model()->findByPk($_GET['id']);
	            break;
            case 'categories':
	            $models = Categories::model()->findByPk($_GET['id']);
	            break;
            case 'browsing':
	            $models = Browsing::model()->findByPk($_GET['id']);
	            break;
            case 'queries':
	            $models = Queries::model()->findByPk($_GET['id']);
	            break;
            case 'adtracks':
	            $models = Adtracks::model()->findByPk($_GET['id']);
	            break;
            case 'adtrackssources':
	            $models = AdtracksSources::model()->findByPk($_GET['id']);
	            break;
            case 'whitelists':
	            $models = $this->_updateWhitelist($put_vars);
	            break;
	        default:
	            $this->_sendResponse(501, 
	                sprintf( 'Error: Mode <b>update</b> is not implemented for model <b>%s</b>',
	                $_GET['model']) );
	            Yii::app()->end();
	    }

	    // Did we find the requested model? If not, raise an error
	    if($model === null)
	        $this->_sendResponse(400, 
	                sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",
	                $_GET['model'], $_GET['id']) );
	 
	    // Try to assign PUT parameters to attributes
	    foreach($put_vars as $var=>$value) {
	        // Does model have this attribute? If not, raise an error
	        if($model->hasAttribute($var))
	            $model->$var = $value;
	        else {
	            $this->_sendResponse(500, 
	                sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>',
	                $var, $_GET['model']) );
	        }
	    }
	    // Try to save the model
	    if($model->save())
	        $this->_sendResponse(200, CJSON::encode($model),'application/json');
	    else
	        // prepare the error $msg
	        // see actionCreate
	        // ...
	        $this->_sendResponse(500, $msg );
	}

    public function actionDelete()
	{
	    switch($_GET['model'])
	    {
	        // Load the respective model
	        case 'users':
	            $model = Users::model()->findByPk($_GET['id']);
	            break;
            case 'categories':
	            $model = Categories::model()->findByPk($_GET['id']);
	            break;
            case 'browsing':
	            $model = Browsing::model()->findByPk($_GET['id']);
	            break;
            case 'queries':
	            $model = Queries::model()->findByPk($_GET['id']);
	            break;
            case 'adtracks':
	            $model = Adtracks::model()->findByPk($_GET['id']);
	            break;
            case 'adtrackssources':
	            $model = AdtracksSources::model()->findByPk($_GET['id']);
	            break;
	        default:
	            $this->_sendResponse(501, 
	                sprintf('Error: Mode <b>delete</b> is not implemented for model <b>%s</b>',
	                $_GET['model']) );
	            Yii::app()->end();
	    }
	    // Was a model found? If not, raise an error
	    if($model === null)
	        $this->_sendResponse(400, 
	                sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",
	                $_GET['model'], $_GET['id']) );
	 
	    // Delete the model
	    $num = $model->delete();
	    if($num>0)
	        $this->_sendResponse(200, $num,'application/json');    //this is the only way to work with backbone
	    else
	        $this->_sendResponse(500, 
	                sprintf("Error: Couldn't delete model <b>%s</b> with ID <b>%s</b>.",
	                $_GET['model'], $_GET['id']) );
	}

	private function _checkAuth()
	{
	    // Check if we have the USERNAME and PASSWORD HTTP headers set?
	    if(!(isset($_SERVER['HTTP_X_USERNAME']) and isset($_SERVER['HTTP_X_PASSWORD']))) {
	        // Error: Unauthorized
	        $this->_sendResponse(401);
	    }
	    $username = $_SERVER['HTTP_X_USERNAME'];
	    $password = $_SERVER['HTTP_X_PASSWORD'];
	    // Find the user
	    $user=User::model()->find('LOWER(username)=?',array(strtolower($username)));
	    if($user===null) {
	        // Error: Unauthorized
	        $this->_sendResponse(401, 'Error: User Name is invalid');
	    } else if(!$user->validatePassword($password)) {
	        // Error: Unauthorized
	        $this->_sendResponse(401, 'Error: User Password is invalid');
	    }
	}

	private function _getStatusCodeMessage($status)
	{
	    // these could be stored in a .ini file and loaded
	    // via parse_ini_file()... however, this will suffice
	    // for an example
	    $codes = Array(
	        200 => 'OK',
	        400 => 'Bad Request',
	        401 => 'Unauthorized',
	        402 => 'Payment Required',
	        403 => 'Forbidden',
	        404 => 'Not Found',
	        500 => 'Internal Server Error',
	        501 => 'Not Implemented',
	    );
	    return (isset($codes[$status])) ? $codes[$status] : '';
	}

	private function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
	{
	    // set the status
	    $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
	    header($status_header);
	    // and the content type
	    header('Content-type: ' . $content_type);
	 
	    // pages with body are easy
	    if($body != '')
	    {
	        // send the body
	        echo $body;
	    }
	    // we need to create the body if none is passed
	    else
	    {
	        // create some body messages
	        $message = '';
	 
	        // this is purely optional, but makes the pages a little nicer to read
	        // for your users.  Since you won't likely send a lot of different status codes,
	        // this also shouldn't be too ponderous to maintain
	        switch($status)
	        {
	            case 401:
	                $message = 'You must be authorized to view this page.';
	                break;
	            case 404:
	                $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
	                break;
	            case 500:
	                $message = 'The server encountered an error processing your request.';
	                break;
	            case 501:
	                $message = 'The requested method is not implemented.';
	                break;
	        }
	 
	        // servers don't always have a signature turned on 
	        // (this is an apache directive "ServerSignature On")
	        $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];
	 
	        // this should be templated in a real-world solution
	        $body = '
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
			<html>
			<head>
			    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			    <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
			</head>
			<body>
			    <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
			    <p>' . $message . '</p>
			    <hr />
			    <address>' . $signature . '</address>
			</body>
			</html>';
	 
	        echo $body;
	    }
	    Yii::app()->end();
	}

	public function _listAchievements(){
            
        $criteria=new CDbCriteria(array(
            'condition'=>'t.deleted=0 AND t.achievements_finish >= :now AND t.achievements_start <= :now',
            'params'=>array(
                ':now'=>date("Y-m-d H:i:s"),
            ),
            'limit'=>5,
            'order'=>'t.created_at DESC',
        ));
        
		$achievements= Achievements::model()->findAll($criteria);
        
		$achievements_valid=array();

		foreach ($achievements as $achievement){
            $achievements_valid[]=$achievement;
		}
		return $achievements_valid;
	}

	public function _updateWhitelist($put_vars){
      
        /**
         * This feature gets disabled for now until future optimization.
         */
         $this->_sendResponse(200, CJSON::encode(array()),'application/json');
         Yii::app()->end();
        return false;

		$user_id= $_GET['user_id'];
		$member_id= isset($_GET['member_id']) ? $_GET['member_id'] : null;

		if ($put_vars!=null)
		{


			foreach ($put_vars as $domain => $services){

				foreach ($services as $service_name => $status){
				  
				  // split $service_name into name and category
				  $category=null;
				  $service_name_parts=explode(":", $service_name);
				  if (count($service_name_parts) > 1) {
				    // get last item concatenated by ':' and assign it as category
				    $category = array_pop($service_name_parts);
				    // build back the original name of the service without the category
				    $service_name=implode(":", $service_name_parts);
				  }
				  
				  // skip this service if it did not contain a category
				  if ($category==null) {
				    continue;
				  }

          // get the current whitelist
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

          // if whitelist not found
     		 	if (count($data)==0 && $status) {

          	$services = array();
            
            // * all
          	if ($service_name == '*') {
            	$service = new stdClass();
            	$service->adtracks_sources_id='1';
  
            	$services[]=$service;
            } else {
              
              // find current service by name cand category
            	$services = Yii::app()->db->createCommand()
              ->setFetchMode(PDO::FETCH_OBJ)
              ->select('s.id as adtracks_sources_id')
              ->from('tbl_adtracks_sources s')
              ->join('tbl_adtracks_types ty','ty.id=s.adtrack_type_id')
              ->where(array(
                          'and',
                          's.name = :service_name',
                          'ty.name = :category',
                          ),
                  array(
                          ':service_name'=>$service_name,
                          ':category'=>$category,
                          )
                  )
              ->queryAll();
            }
              
            // create ad track source if not found?
            if (count($services)==0) {
              
              // get adtrack_type_id for current category
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
              
              if (!$adtrack_type_id) {
                $this->_sendResponse(501,  
                 sprintf($service_name.'-Adtrack type not found <b>%s</b>',
                 $category) );
                Yii::app()->end();
              }
              
              // Disabled until we get a $service_url from somewhere
              // Details: the api throws error because there are services in the .json
              // that are not available in the database, so it can't add a whitelist
              // for a service that doesn't exist in the db, this code is ment
              // to create the service if missing, but in the whitelist data the
              // extension is sending right now we haven't got the service_url
              // so we can't create it for the moment.
              // Anyways this might not even be required since basically a 
              // "create adtrack - blocked" would be run before saving whitelist
              // and that command does have the service_url and does create it if it 
              // doesn't exist. Ao this gives error when you have in the whitelist a service
              // that did not sent an adtrack to the server yet.
              if (isset($service_url)) {
                $service = new AdtracksSources; 
              	$service->adtrack_type_id=$adtrack_type_id;
              	$service->name=$service_name;
              	$service->url=$service_url;
        
              	if (!$service->save()) {
            		  var_dump($service->errors);die;
        	    	} else {
        	    	  
        	    	  // add it to the array
        	    		$tmp = new stdClass();
                	$tmp->adtracks_sources_id=$service->id;
      
                	$services[]=$tmp;
        	    		
        	    	}
              }
              
              
              
            }
          	
            // if service was found, add new whitelist
            if (count($services)>0) {

            	$adtracks_sources_id = $services[0]->adtracks_sources_id;
            	$model = new Whitelists;
            	$model->user_id=$user_id;
        	  	$model->member_id=$member_id;
        	  	$model->adtracks_sources_id=$adtracks_sources_id;
        	  	$model->domain = $domain;
        	  	$model->status = true;
    	  		
      	  	  $model->save();
      	  	
            } else{
             	$this->_sendResponse(501,  
                 sprintf($service_name.'-Adtrack source not found <b>%s</b>',
                 $service_name) );
              Yii::app()->end();
            }

          	
          } else if (count($data)>0 && $status==false){

            // if whitelist already existed, and status is false, update its status
          	$model = Whitelists::model()->findByPk($data[0]->whitelist_id);
          	$model->status = false;
          	$model->save();
          	
          }

        }

			}
		}

		$model = $this->_viewWhitelist();

		$this->_sendResponse(200, CJSON::encode($model),'application/json');
		die();

	}

	public function _createWhitelist(){
	}
	
	
	public function _viewQueriesblacklist(){
		$query= $_GET['query'];
		$lang= $_GET['lang'];

		$data = Yii::app()->db->createCommand()
	                ->setFetchMode(PDO::FETCH_OBJ)
	                ->select('stem')
	                ->from('tbl_queries_blacklist')
	                ->where('lang = :lang', array(':lang'=>$lang))
	                ->queryAll();
	    
	    
    	$regexp = array();	
	    if(count($data) > 0){
	    	foreach($data as $object){
	    		$regexp[]=$object->stem;
	    	}
	    }

	    $regexp='/'.join($regexp,'|').'/';
	    $matched=preg_match($regexp, $query,$matches);
	    
		return $matches;
	}

	public function _viewBlacklist(){
		$lang= $_GET['query'];

		$data = Yii::app()->db->createCommand()
	                ->setFetchMode(PDO::FETCH_OBJ)
	                ->select('stem')
	                ->from('tbl_queries_blacklist')
	                ->where('lang = :lang', array(':lang'=>$lang))
	                ->queryAll();
	    
    	$result = array();	
	    if(count($data) > 0){
	    	foreach($data as $key=>$value){
	    		$result[]=$value->stem;
	    	}
	    }

		return $result;
	}

	public function _viewWhitelist(){

		$user_id= $_GET['user_id'];
		$member_id= isset($_GET['member_id']) ? $_GET['member_id'] : null;

		$data = Yii::app()->db->createCommand()
	                ->setFetchMode(PDO::FETCH_OBJ)
	                ->select('s.name as service, w.status as status, w.domain as domain')
	                ->from('tbl_whitelists w, tbl_adtracks_sources s')
	                ->where(array(
	                            'and',
	                            'w.adtracks_sources_id = s.id',
	                            '(w.user_id = :user_id or w.member_id = :member_id)' ),
	                    array(
	                            
	                            ':user_id'=>$user_id,
	                            ':member_id'=>$member_id)
	                    )
	                ->queryAll();

        $result = array();

        foreach($data as $whitelist){

        	$domain = $whitelist->domain;

        	if (!isset($result[$domain])){
        		$result[$domain]=array();
        	}
      
        	$result[$domain][$whitelist->service]=$whitelist->status;
        }

        return $result;
	}

  
	public function _createAdtrack($params) {
      
    // get post info
  	$member_id=$params['member_id'];
  	$user_id=$params['user_id'];
  	$usertime=$params['usertime'];
    $category=$params['category'];
    $service_name=$params['service_name'];
    $service_url=$params['service_url'];
    $domain=$params['domain'];
    $status=$params['status'];
    $url=$params['url'];

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

    //$this->_sendResponse(501, CJSON::encode($data) );
    //  Yii::app()->end();

    // if found by name and category, assign as $adtracks_sources_id
    if (count($data)>0) {
		  $adtracks_sources_id = $data[0]->adtracks_sources_id;
    } else {

      // was not found, let's find just the type(category)
    	$data = Yii::app()->db->createCommand()
      ->setFetchMode(PDO::FETCH_OBJ)
      ->select('t.id as adtracks_sources_id')
      ->from('tbl_adtracks_types t')
      ->where(array(
                  'and',
                  't.name = :category'),
      array(
              ':category'=>$category
              )
      )
      ->queryAll();
      
      // okay, we've got the type(category), let's create a new source in that category with the data provided in POST
      if (count($data)>0) {

      	$adtracks_sources_id = $data[0]->adtracks_sources_id;

      	$service = new AdtracksSources; 
      	$service->adtrack_type_id=$adtracks_sources_id ;
      	$service->name=$service_name;
      	$service->url=$service_url;

      	if (!$service->save()) {
    		  var_dump($service->errors);die;
	    	} else {
	    		$adtracks_sources_id = $service->id;
	    	}
      } else{
		    $this->_sendResponse(501, 
        sprintf('Adtrack type(category) not found <b>%s</b>',
        $category) );
        Yii::app()->end();
      }
    }
    
    // if we finally got the source id, assign fields to adtrack model
    if (isset($adtracks_sources_id)) {
      $model = new Adtracks; 
    	$model->member_id=$member_id;
    	$model->user_id=$user_id;
		  $model->usertime=$usertime;
    	$model->adtracks_sources_id=$adtracks_sources_id;
    	$model->domain=$domain;
    	$model->status=$status;
    	$model->url=$url;
  	} else {
	    $this->_sendResponse(501, 
          sprintf('Adtrack source not found <b>%s</b>',
          $service_name) );
      Yii::app()->end();
    }
    
    return $model;
	}
}