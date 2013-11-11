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
 
    // Actions
    public function actionList()
	{
	    // Get the respective model instance
	    switch($_GET['model'])
	    {
            case 'users':
	            $models = Users::model()->findAll();
	            break;
            case 'categories':
	            $models = Categories::model()->findAll();
	            break;
            case 'history':
	            $models = History::model()->findAll();
	            break;
            case 'queries':
	            $models = Queries::model()->findAll();
	            break;
            case 'threats':
	            $models = Threats::model()->findAll();
	            break;
            case 'services':
	            $models = Services::model()->findAll();
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
	        $this->_sendResponse(200, 
	                sprintf('No items where found for model <b>%s</b>', $_GET['model']) );
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
	    if(!isset($_GET['id']))
	        $this->_sendResponse(500, 'Error: Parameter <b>id</b> is missing' );
	 
	    switch($_GET['model'])
	    {
	        case 'users':
	            $model = Users::model()->findByPk($_GET['id']);
				break;
            case 'categories':
	            $model = Categories::model()->findByPk($_GET['id']);
	            break;
            case 'history':
	            $model = History::model()->findByPk($_GET['id']);
	            break;
            case 'queries':
	            $model = Queries::model()->findByPk($_GET['id']);
	            break;
            case 'threats':
	            $model = Threats::model()->findByPk($_GET['id']);
	            break;
            case 'services':
	            $model = Services::model()->findByPk($_GET['id']);
	            break;
            case 'whitelists':
	            $model = $this->_viewWhitelist();
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
            case 'history':
	            $model = new History;  
	            break;
            case 'queries':
	            $model = new Queries;  
	            break;
            case 'threats':
	            $model = new Threats;  
	            break;
            case 'services':
	            $model = new Services;  
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

	    if ($_GET['model'] == 'threats'){
			$model=$this->_createPost();
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

	    //Set create_at
		if (!isset($model->create_at)){
		 	$model->create_at = date('Y-m-d H:i:s');
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
            case 'history':
	            $models = History::model()->findByPk($_GET['id']);
	            break;
            case 'queries':
	            $models = Queries::model()->findByPk($_GET['id']);
	            break;
            case 'threats':
	            $models = Threats::model()->findByPk($_GET['id']);
	            break;
            case 'services':
	            $models = Services::model()->findByPk($_GET['id']);
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
            case 'history':
	            $model = History::model()->findByPk($_GET['id']);
	            break;
            case 'queries':
	            $model = Queries::model()->findByPk($_GET['id']);
	            break;
            case 'threats':
	            $model = Threats::model()->findByPk($_GET['id']);
	            break;
            case 'services':
	            $model = Services::model()->findByPk($_GET['id']);
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

	public function _updateWhitelist($put_vars){

		$user_id = $_GET['id'];

		if ($put_vars!=null)
		{
			foreach ($put_vars as $domain => $services){

				foreach ($services as $service_name => $status){

					$data = Yii::app()->db->createCommand()
			                ->setFetchMode(PDO::FETCH_OBJ)
			                ->select('w.id as whitelist_id')
			                ->from('tbl_whitelists w, tbl_services s')
			                ->where(array(
			                            'and',
			                            'w.service_id = s.id',
			                            's.name = :service_name',
			                            'w.domain = :domain'),
			                    array(
			                            ':domain'=>$domain,
			                            ':service_name'=>$service_name)
			                    )
			                ->queryAll();

		            if (count($data)==0 && $status){

		            	$service = Yii::app()->db->createCommand()
			                ->setFetchMode(PDO::FETCH_OBJ)
			                ->select('s.id as service_id')
			                ->from('tbl_services s')
			                ->where(array(
			                            'and',
			                            's.name = :service_name'),
			                    array(
			                            ':service_name'=>$service_name)
			                    )
			                ->queryAll();

		                if (count($service)>0){

		                	$service_id = $service[0]->service_id;
		                	$model = new Whitelists;
			        	  	$model->user_id=$user_id;
			        	  	$model->service_id=$service_id;
			        	  	$model->domain = $domain;
			        	  	$model->status = true;
		        	  		$model->create_at = date('Y-m-d H:i:s');

			        	  	$model->save();
			        	  	
		                }
		                else
		                {
		                	$this->_sendResponse(501, 
				                sprintf('Service not found <b>%s</b>',
				                $service_name) );
				            Yii::app()->end();
		                }

		            	
		            } else if (count($data)>0 && $status==false){

		            	$model = Whitelists::model()->findByPk($data[0]->whitelist_id);
		            	$model->delete();
		            }

	            }

			}
		}

		$model = $this->_viewWhitelist();

		$this->_sendResponse(200, CJSON::encode($model),'application/json');

	}

	public function _createWhitelist(){
	}
	
	public function _viewWhitelist(){

		$user_id=$_GET['id'];




		$data = Yii::app()->db->createCommand()
	                ->setFetchMode(PDO::FETCH_OBJ)
	                ->select('s.name as service, w.status as status, w.domain as domain')
	                ->from('tbl_whitelists w, tbl_services s')
	                ->where(array(
	                            'and',
	                            'w.service_id = s.id',
	                            'w.user_id = :user_id'),
	                    array(
	                            ':user_id'=>$user_id)
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

	public function _createPost(){

		$user_id=$_POST['user_id'];
	    $category=$_POST['category'];
	    $service_name=$_POST['service_name'];
	    $service_url=$_POST['service_url'];
	    $domain=$_POST['domain'];
	    $url=$_POST['url'];

	    $data = Yii::app()->db->createCommand()
	                ->setFetchMode(PDO::FETCH_OBJ)
	                ->select('s.id as service_id, c.id as category_id')
	                ->from('tbl_categories c, tbl_services s')
	                ->where(array(
	                            'and',
	                            'c.name = :category',
	                            's.name = :service_name'),
	                    array(
	                            ':category'=>$category,
	                            ':service_name'=>$service_name)
	                    )
	                ->queryAll();

	    if (count($data)>0){
			$service_id = $data[0]->service_id;
	    }
	    else{

	    	$data = Yii::app()->db->createCommand()
	                        ->setFetchMode(PDO::FETCH_OBJ)
	                        ->select('c.id as category_id')
	                        ->from('tbl_categories c')
	                        ->where(array(
	                                    'and',
	                                    'c.name = :category'),
	                            array(
	                                    ':category'=>$category)
	                            )
	                        ->queryAll();

	        if (count($data)>0){

	        	$category_id = $data[0]->category_id;

	        	$service = new Services; 
	        	$service->category_id=$category_id ;
	        	$service->name=$service_name;
	        	$service->url=$service_url;

	        	if (!$service->save()){
		    		var_dump($service->errors);die;
		    	}else{
		    		$service_id = $service->service_id;
		    	}
	        }
	        else{
				$this->_sendResponse(501, 
	                sprintf('Category not found <b>%s</b>',
	                $category) );
	            Yii::app()->end();
	        }
	    }

	    if (isset($service_id)){

	        $model = new Threats; 
	    	$model->user_id=3;
	    	$model->service_id=$service_id;
	    	$model->domain=$domain;
	    	$model->url=$url;
		}
		else{
			$this->_sendResponse(501, 
	            sprintf('Service not found <b>%s</b>',
	            $service_name) );
	        Yii::app()->end();
	    }	

	    return $model;
	}
}