<?php

class GoodDataController extends Controller {

    public $bodyId = 'tgd-good-data';
    
    public $displayMenu = true;

    public function filters() {
        //return array('accessControl'); // perform access control for CRUD operations
    }

    public function accessRules() {
        return array(
            // array('allow', // allow authenticated users to access all actions
            //     'users' => array('@'),
            // ),
            // array('deny'),
        );
    }


    public function actionCompanyAchievementsData() {

        $result = array();

        // set cache key for this data
        $cacheKey="CompanyAchievementsData";
        $result=Yii::app()->cache->get($cacheKey);

        if($result===false)
        {
            // regenerate because it is not found in cache

            // Active users ----------------------
            $total = Yii::app()->db->createCommand("
                SELECT count(*) from (
                    SELECT member_or_user_id
                    FROM tbl_active_users 
                    WHERE tbl_active_users.created_at >= (now() - '30 days'::interval) AND tbl_active_users.created_at <=  now()  
                    GROUP BY member_or_user_id
                ) as tmp")->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['monthly_active_users'] = $total;

            // registered members ----------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*) as total')
                ->from('tbl_members')
                ->where(array(
                        'and',
                        'status = :status',
                    ), array(
                        ':status' => User::STATUS_ACCEPTED)
                )
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['total_registered_members'] = $total;

            // queries last month ---------------------

            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('*')
                ->from('view_queries_month')
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['monthly_queries_processed'] = $total;

            // queries traded blocked last month ------------------

            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('*')
                ->from('view_queries_trade_month')
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['monthly_queries_trade_blocked'] = $total;

            // queries traded last month ------------------

            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('*')
                ->from('view_queries_trade_month')
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['monthly_queries_trade_processed'] = $total;

            // and save it in cache for later use:
            Yii::app()->cache->set($cacheKey, $result, Yii::app()->params['cacheLifespanOneDay']);
        }

        $this->_sendResponse(200, CJSON::encode($result), 'application/json');
    }

    public function actionGoodInvestmentsData() {

        $result = array();

        $cacheKey="GoodInvestmentsData";
        $result=Yii::app()->cache->get($cacheKey);

        if($result===false)
        {
            // regenerate because it is not found in cache

            // money earned -----------------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('(sum(gross_amount) - sum(expenses)) as total')
                ->from('tbl_incomes')
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            // convert to usd
            $total=Currencies::convertDefaultTo($total, 'USD');
            $total=Yii::app()->numberFormatter->formatCurrency($total, 'USD');

            $result['total_money_earned'] = $total;

            // money lost -----------------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('sum(loss) as total')
                ->from('tbl_loans')
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['total_lost'] = Yii::app()->numberFormatter->formatCurrency($total, 'USD');

            // money lent -----------------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('sum(contribution) as total')
                ->from('tbl_loans')
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['total_contribution'] = Yii::app()->numberFormatter->formatCurrency($total, 'USD');

            // Outstanding portfolio -----------------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('sum(contribution - paidback - loss) as total')
                ->from('tbl_loans')
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['total_outstanding'] = Yii::app()->numberFormatter->formatCurrency($total, 'USD');

            // money repaid -----------------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('sum(paidback) as total')
                ->from('tbl_loans')
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['total_paidback'] = Yii::app()->numberFormatter->formatCurrency($total, 'USD');

            // and save it in cache for later use:
            Yii::app()->cache->set($cacheKey, $result, Yii::app()->params['cacheLifespanOneDay']);
        }

        $this->_sendResponse(200, CJSON::encode($result), 'application/json');
    }

    public function actionGoodProjectsData() {

        $result = array();

        $cacheKey="GoodProjectsData";
        $result=Yii::app()->cache->get($cacheKey);

        if($result===false)
        {
            // regenerate because it is not found in cache

            // loans_countries -----------------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*)')
                ->from('view_loans_countries')
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['loans_countries'] = $total;

            // loans_count -----------------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*)')
                ->from('tbl_loans')
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['loans_count'] = $total;

            // loans_paying_back_count -----------------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*)')
                ->from('tbl_loans')
                ->where(array(
                        'and',
                        'id_loans_status = :id',
                    ), array(
                        ':id' => 3)
                )
                ->queryScalar();

            if (!count($total) > 0) $total = 0;

            $result['loans_paying_back_count'] = $total;

            // loans_paid_back_count -----------------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*)')
                ->from('tbl_loans')
                ->where(array(
                        'and',
                        'id_loans_status = :id',
                    ), array(
                        ':id' => 4)
                )
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['loans_paid_back_count'] = $total;

            // loans_lost_count -----------------------
            $total = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*)')
                ->from('tbl_loans')
                ->where(array(
                        'and',
                        'id_loans_status = :id',
                    ), array(
                        ':id' => 5)
                )
                ->queryScalar();

            if (!count($total) > 0) $total = 0;
            $result['loans_lost_count'] = $total;

            // and save it in cache for later use:
            Yii::app()->cache->set($cacheKey, $result, Yii::app()->params['cacheLifespanOneDay']);
        }

        $this->_sendResponse(200, CJSON::encode($result), 'application/json');
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     * - Loads the loans data.
     */
    public function actionIndex() {
        // set page layout
        $this->layout = '//layouts/blank';
        // set page title
        $this->pageTitle = " - Good Data";
        
        // ------------ intialize pagination data for loans

        $loans_pag = 1;
        $loans_pag_size = 10;

        if (isset($_GET['loans_pag']))
            $loans_pag = $_GET['loans_pag'];

        // get amount of data
        $loans = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*)')
                ->from('tbl_loans')
                ->queryAll();

        $loans_total = $loans[0]->count;
        
        // build pagination: set total queries, page size, page variable and params
        $loans_pages = new CPagination($loans_total);
        $loans_pages->pageSize=$loans_pag_size; // 10
        $loans_pages->pageVar='loans_pag';
        $loans_pages->params=  $_GET;

        // get loans
        $loans = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('tbl_loans.*, tbl_loans_activities.name_en as activity, tbl_countries.name_en as country, tbl_loans_status.name_en as status, tbl_countries.code')
                ->from('tbl_loans, tbl_loans_activities, tbl_countries, tbl_loans_status')
                ->where(array(
                            'and',
                            'tbl_loans_activities.id = tbl_loans.id_loans_activity',
                            'tbl_countries.id = tbl_loans.id_countries',
                            'tbl_loans_status.id = tbl_loans.id_loans_status',
                        )
                    )
                ->order('loan_date DESC')
                ->limit($loans_pag_size)
                ->offset(($loans_pag-1) * $loans_pag_size)
                ->queryAll();

        $this->render('index', array(
            'loans' => $loans,
            'loans_pages' => $loans_pages,
            )
        );
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
