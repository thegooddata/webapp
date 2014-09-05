<?php

class OaApiController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'checkToken',
        );
    }

    public function filterCheckToken($filterChain) {
        $token=Yii::app()->request->getQuery("token", null);
        if (!defined('OA_API_TOKEN')) {
            $this->_sendResponse(500);
        }
        if ($token != OA_API_TOKEN) {
            $this->_sendResponse(401);
        }
        $filterChain->run();
    }

    /**
     * Simple command for testing connectivity.
     */
    public function actionIndex() {
        $result=array(
            'msg'=>'Hello world',
        );
        $this->_sendResponse(200, CJSON::encode($result), 'application/json');
    }

    public function actionGetLoggedUserBySessionId() {
        $result=array();
        $session_id=Yii::app()->request->getQuery("session_id", null);
        if (!empty($session_id)) {
            
            $session=new CHttpSession;
            $session->sessionID=$session_id;
            $session->open();
            $session_data=$session->toArray();
            
            $statekey=Yii::app()->user->stateKeyPrefix;
            
            $user_id_key="{$statekey}__id";
            
            if (isset($session_data[$user_id_key])) {
                $result=$this->getUserInfoById($session_data[$user_id_key]);
            }
            
        }
        $this->_sendResponse(200, CJSON::encode($result), 'application/json');
    }

    /**
     * Get a user fields by user_id.
     */
    public function actionGetUserInfoById() {
        $user_id=Yii::app()->request->getQuery("user_id", null);
        $result=$this->getUserInfoById($user_id);
        $this->_sendResponse(200, CJSON::encode($result), 'application/json');
    }
    
    /**
     * Internal function to get user fields.
     * @param integer $user_id
     * @return array
     */
    private function getUserInfoById($user_id=null) {
        $result=array();
        
        if (!empty($user_id)) {
            $user = Yii::app()->getModule('user')->user($user_id);
            $result['id']=$user->id;
            $result['username']=$user->username;
            $result['email']=$user->email;
            $result['status']=$user->status;
            $result['updated']=strtotime($user->updated_at);
            
            
            
//            $date = new DateTime($user->updated_at, new DateTimeZone(date_default_timezone_get()));
//            $result['updated_at']=$user->updated_at;
//            $result['updated_at_f']=date("r", strtotime($user->updated_at));
//            $result['updated_at_u']=$date->format('U');
//            $result['updated_at_ur']=$date->format('Y-m-d H:i:s');
        }
        return $result;
    }

    private function _getStatusCodeMessage($status) {
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

    private function _sendResponse($status = 200, $body = '', $content_type = 'text/html') {
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        header('Content-type: ' . $content_type);

        // pages with body are easy
        if ($body != '') {
            // send the body
            echo $body;
        }
        // we need to create the body if none is passed
        else {
            // create some body messages
            $message = '';

            // this is purely optional, but makes the pages a little nicer to read
            // for your users.  Since you won't likely send a lot of different status codes,
            // this also shouldn't be too ponderous to maintain
            switch ($status) {
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
            $signature = !isset($_SERVER['SERVER_SIGNATURE']) ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

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

}
