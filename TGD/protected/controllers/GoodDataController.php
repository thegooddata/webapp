<?php

class GoodDataController extends Controller
{
	public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions
                'users'=>array('@'),
            ),
            array('deny'),
        );
    }
    
    public function actionCompanyAchievementsData(){

    	$result = array();
 


 		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('*')
		    ->from('view_members_month')
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =$datas[0]->total;

		$result['monthly_active_users']=$total;

		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('count(*) as total')
		    ->from('tbl_members')
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =$datas[0]->total;

		$result['total_registered_members']=$total;


		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('*')
		    ->from('view_queries_month')
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =$datas[0]->total;

		$result['monthly_queries_processed']=$total;


		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('*')
		    ->from('view_queries_trade_month')
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =$datas[0]->total;

		$result['monthly_queries_trade_processed']=$total;


		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('sum(gross_amount) as total')
		    ->from('tbl_incomes')
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =$datas[0]->total;

		$result['total_money_earned']=$total;


		$this->_sendResponse(200, CJSON::encode($result),'application/json');
    }

    public function actionGoodInvestmentsData(){

    	$result = array();


		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('sum((gross_amount-expenses) * loan_reserved/100) as total')
		    ->from('tbl_incomes')
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =number_format($datas[0]->total, 2, '.', '');

		$result['money_reserved']=$total;

    	$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('sum(contribution) as total')
		    ->from('tbl_loans')
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =$datas[0]->total;

		$result['money_lent']=$total;

    	$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('sum(paidback) as total')
		    ->from('tbl_loans')
		    ->where(array(
	                'and',
	                'id_loans_status = :id',
	                ),
		   			array(
					':id'=>4)
					)
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =$datas[0]->total;

		$result['money_repaid']=$total;

		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('sum(paidback) as total')
		    ->from('tbl_loans')
		    ->where(array(
	                'and',
	                'id_loans_status = :id',
	                ),
		   			array(
					':id'=>5)
					)
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =$datas[0]->total;

		$result['money_lost']=$total;




		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('sum(contribution-paidback) as total')
		    ->from('tbl_loans')
		    ->where(array(
	                'and',
	                'id_loans_status not in (:ids)',
	                ),
		   			array(
					':ids'=>'4')
					)
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =$datas[0]->total;

		$result['outstanding_portfolio']=$total;


		$this->_sendResponse(200, CJSON::encode($result),'application/json');
    }

    public function actionGoodProjectsData(){

    	$result = array();

    	$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('SUM(total) as total')
		    ->from('view_loans_countries')
		    ->queryAll();

	    $total =0;
	    if ($datas[0]->total != null)
	    	$total =$datas[0]->total;
	    
		$result['loans_countries']=$total;

		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('count(*)')
		    ->from('tbl_loans')
		    ->queryAll();

		$result['loans_count']=$datas[0]->count;

		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('count(*)')
		    ->from('tbl_loans')
		    ->where(array(
	                'and',
	                'id_loans_status = :id',
	                ),
		   			array(
					':id'=>3)
					)
		    ->queryAll();

		$result['loans_paying_back_count']=$datas[0]->count;

		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('count(*)')
		    ->from('tbl_loans')
		    ->where(array(
	                'and',
	                'id_loans_status = :id',
	                ),
		   			array(
					':id'=>4)
					)
		    ->queryAll();

		$result['loans_paid_back_count']=$datas[0]->count;

		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('count(*)')
		    ->from('tbl_loans')
		    ->where(array(
	                'and',
	                'id_loans_status = :id',
	                ),
		   			array(
					':id'=>5)
					)
		    ->queryAll();

		$result['loans_lost_count']=$datas[0]->count;
		
    	$this->_sendResponse(200, CJSON::encode($result),'application/json');
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout='//layouts/blank';

		$loans = Yii::app()->db->createCommand()
			    ->setFetchMode(PDO::FETCH_OBJ)
			    ->select('tbl_loans.*,tbl_loans_activities.name_en_us as activity,tbl_countries.name_en_us as country, tbl_loans_status.name_en_us as status, tbl_countries.code')
			    ->from('tbl_loans,tbl_loans_activities,tbl_countries,tbl_loans_status')
			     ->where(array(
	                'and',
	                'tbl_loans_activities.id = tbl_loans.id_loans_activity',
	                'tbl_countries.id = tbl_loans.id_countries',
	                'tbl_loans_status.id = tbl_loans.id_loans_status',
	                )
			     )
			    ->queryAll();

		$this->render('index', array(
			'loans'=>$loans,
			)
		);
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
	
}