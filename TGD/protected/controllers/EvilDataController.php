<?php

class EvilDataController extends Controller {

    public $bodyId = 'tgd-evil-data';
    
    public $displayMenu = true;

    public function filters() {
        return array('accessControl'); // perform access control for CRUD operations
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated users to access all actions
                'users' => array('@'),
            ),
            array('deny'),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->layout = '//layouts/blank';

         

        $member_id = Yii::app()->user->id;

        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                // ->select('a.member_id,a.domain, sum(a.adtracks) as adtracks, sum(b.visited) as visited, sum(a.adtracks) * sum(b.visited) as total')
                ->select('a.member_id,a.domain, ROUND( sum(a.adtracks)/sum(b.visited) , 2)  as adtracks, sum(b.visited) as visited, sum(a.adtracks) as total ')
                ->from('view_adtracks_members a,view_browsing_members b')
                ->where(array(
                    'and',
                    'a.domain = b.domain and a.member_id = b.member_id and a.member_id = :member_id'
                        ), array(
                    'member_id' => $member_id)
                )
                ->group('a.domain, a.member_id ')
                ->order('total desc')
                ->limit('10')
                ->queryAll();



        // 	select a.member_id,a.domain, sum(a.adtracks) as adtracks, sum(b.visited) as visited, sum(a.adtracks) * sum(b.visited) as total
        // from view_adtracks_members a,view_browsing_members b 
        // where a.domain = b.domain and a.member_id = b.member_id and a.member_id = 1
        // group by a.domain, a.member_id 
        // order by total desc
        // limit 10;

        $this->render('index', array(
            'adtracks' => $adtracks,
                )
        );
    }

    public function _getThreatsDatePerMonth($member_id, $day_start, $day_end) {

        // 	SELECT member_id, DATE(EXTRACT(YEAR FROM created_at) || '-' || EXTRACT(MONTH FROM created_at) || '-01') as date,count(*) AS adtracks
        // FROM tbl_adtracks
        // where created_at between '2014-01-01' and '2014-04-13' and member_id= 1
        // GROUP BY member_id,date
        // order by date

        date_default_timezone_set('UTC');


        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select("member_id, DATE(EXTRACT(YEAR FROM created_at) || '-' || EXTRACT(MONTH FROM created_at) || '-01') as date,count(*) AS adtracks")
                ->from('tbl_adtracks')
                ->where(array(
                    'and',
                    'created_at between :day_start and :day_end and member_id= :member_id'
                        ), array(
                    'day_start' => $day_start,
                    'day_end' => $day_end,
                    'member_id' => $member_id)
                )
                ->group('member_id,date')
                ->order('date')
                ->queryAll();


        $date = $day_start;
        $end_date = $day_end;

        $result = array();

        foreach ($adtracks as $adtrack) {
            $result[strtotime($adtrack->date)] = $adtrack;
        }

        $data = array();

        while (strtotime($date) <= strtotime($end_date)) {

            $value = 0;

            if (isset($result[strtotime($date)])) {
                $value = $result[strtotime($date)]->adtracks;
            }

            $data[] = $value;

            $date = date("Y-m-d", strtotime("+1 month", strtotime($date)));
        }

        return $data;
    }

    public function _getThreatsDatePerDay($member_id, $day_start, $day_end) {



        // 	SELECT member_id, DATE(created_at) AS date,count(*) AS adtracks
        // FROM tbl_adtracks
        // where created_at between '2014-01-01' and '2014-04-13' and member_id= 1
        // GROUP BY member_id,DATE(created_at)
        // order by DATE(created_at)

        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('member_id, DATE(created_at) AS date,count(*) AS adtracks')
                ->from('tbl_adtracks')
                ->where(array(
                    'and',
                    'created_at between :day_start and :day_end and member_id= :member_id'
                        ), array(
                    'day_start' => $day_start,
                    'day_end' => $day_end,
                    'member_id' => $member_id)
                )
                ->group('member_id,DATE(created_at)')
                ->order('DATE(created_at)')
                ->queryAll();

        // echo "<pre>";
        // var_dump($adtracks);die;

        $date = $day_start;
        $end_date = $day_end;

        $result = array();

        foreach ($adtracks as $adtrack) {
            $result[strtotime($adtrack->date)] = $adtrack;
        }

        $data = array();

        while (strtotime($date) <= strtotime($end_date)) {

            $value = 0;

            if (isset($result[strtotime($date)])) {
                $value = $result[strtotime($date)]->adtracks;
            }

            $data[] = $value;

            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        }

        return $data;
    }

    public function _getColor($adtracks) {

        $result = array();
        foreach ($adtracks as $adtrack) {

            $color = '';

            if ($adtrack->name == 'Advertising') {
                $color = '#8ac6ea';
                $light_color = '#cbe6f6';
            } else if ($adtrack->name == 'Analytics') {
                $color = '#72bc81';
                $light_color = '#a6d5af';
            } else if ($adtrack->name == 'Others' || $adtrack->name == 'Content') {
                $color = '#fcc34a';
                $light_color = '#fddc95';
            } else if ($adtrack->name == 'Social') {
                $color = '#ea6654';
                $light_color = '#f2a398';
            }

            $tmp = array();
            //$tmp['name'] = $adtrack->name;
            $tmp['value'] = $adtrack->count;
            $tmp['color'] = $color;
            $tmp['highlight'] = $light_color;

            $result[] = $tmp;
        }

        return $result;
    }

    public function actionAdtracksRatios() {

        $member_id = Yii::app()->user->id;

        $result = array();
        
        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select("name, count")
                ->from('view_adtracks_sources_members')
                ->where(array(
                    'and',
                    'member_id= :member_id'
                        ), array(
                    'member_id' => $member_id)
                )
                ->queryAll();


        $you = $this->_getColor($adtracks);

        $result['adtracks_you'] = $you;

        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select("name, count")
                ->from('view_adtracks_sources_total')
                ->queryAll();


        $average = $this->_getColor($adtracks);

        $result['adtracks_average'] = $average;

        $this->_sendResponse(200, CJSON::encode($result), $this->getResponseContentType());
        //view_adtracks_sources_total
    }

    public function actionRiskRatios() {

        // Get risk for member

        $member_id = Yii::app()->user->id;

        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select("_getRiskMember (" . $member_id . ") as risk")
                ->from('tbl_members')
                ->limit(1)
                ->queryAll();

        $result = array();

        $result['risk_you'] = number_format($adtracks[0]->risk, 2, '.', '');

        // Get total risk

        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select("_getRiskTotal () as risk")
                ->from('tbl_members')
                ->limit(1)
                ->queryAll();

        $result['risk_average'] = number_format($adtracks[0]->risk, 2, '.', '');

        // Get risk ratio for member 

        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select("_getRiskRatioMember (" . $member_id . ") as risk")
                ->from('tbl_members')
                ->limit(1)
                ->queryAll();

        $result['risk_ratio_you'] = number_format($adtracks[0]->risk);

        if ($result['risk_ratio_you'] > 70) {
            $result['risk_level'] = 'high';
            $result['risk_level_name'] = 'risk lover';
        } else if ($result['risk_ratio_you'] > 20) {
            $result['risk_level'] = 'mid';
            $result['risk_level_name'] = 'average guy';
        } else {
            $result['risk_level'] = 'low';
            $result['risk_level_name'] = 'risk averse';
        }

        // Get total risk ratio

        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select("_getRiskRatioTotal () as risk")
                ->from('tbl_members')
                ->limit(1)
                ->queryAll();

        
        $result['risk_ratio_average'] = number_format($adtracks[0]->risk);



        $result['percentile'] = number_format($adtracks[0]->risk);

        $this->_sendResponse(200, CJSON::encode($result), $this->getResponseContentType());
    }

    public function actionDataThreatsYear() {

        $member_id = Yii::app()->user->id;
        
        $day_start = date('Y-m-d', strtotime('first day of next month last year', time()));
        $day_end = date('Y-m-d', strtotime('first day next month this year', time()));

        $data = $this->_getThreatsDatePerMonth($member_id, $day_start, $day_end);

        $result = array();
        $result['data'] = $data;
        $result['first_day'] = date('F Y', strtotime($day_start));
        $result['last_day'] = date('F Y');
        $result['total'] = array_sum($data);

        // set cache key for this user
        $dataThreatsYearCacheKey="DataThreatsYear-$member_id";
        $datas=Yii::app()->cache->get($dataThreatsYearCacheKey);
        if($datas===false)
        {
            // regenerate because it is not found in cache
            $datas = Yii::app()->db->createCommand("SELECT _getuserpercentileyear(". $member_id .") AS percentile;")->queryAll();
            // and save it in cache for later use:
            Yii::app()->cache->set($dataThreatsYearCacheKey, $datas, Yii::app()->params['dataThreatsYearCacheDuration']);
        }
        
        
        if (count($datas) > 0)
            $adtrack_percentile = 100 - $datas[0]['percentile'];
        else
            $adtrack_percentile = 100;

        // round up to a multiple of 5
        $adtrack_percentile = $this->_roundUpTo5($adtrack_percentile);
        

        $result['percentile'] = $adtrack_percentile;

        $this->_sendResponse(200, CJSON::encode($result), $this->getResponseContentType());
    }

    public function actionDataThreatsMonth() {

        $member_id = Yii::app()->user->id;

        // when the day is 31, 'last month' returns day 1 of same month
        $minusOneDay = (date('d') == 31)?' -1 day':'';
        
        $day_start = date('Y-m-d', strtotime('last month'.$minusOneDay));
        $day_end = date('Y-m-d', strtotime('+1 day'));

        $data = $this->_getThreatsDatePerDay($member_id, $day_start, $day_end);

        $result = array();
        $result['data'] = $data;
        $result['first_day'] = date('F d', strtotime($day_start));
        $result['last_day'] = date('F d');
        $result['total'] = array_sum($data);

        $datas = Yii::app()->db->createCommand("SELECT _getuserpercentilemonth(". $member_id .") AS percentile;")->queryAll();
        
        if (count($datas) > 0)
            $adtrack_percentile = 100 - $datas[0]['percentile'];
        else
            $adtrack_percentile = 100;

        
        // round up to a multiple of 5
        $adtrack_percentile = $this->_roundUpTo5($adtrack_percentile);

        $result['percentile'] = $adtrack_percentile;

        $this->_sendResponse(200, CJSON::encode($result), $this->getResponseContentType());
    }

    public function actionDataThreatsWeek() {

        $member_id = Yii::app()->user->id;

        $week_start = date('Y-m-d', strtotime('-6 days'));
        $week_end = date('Y-m-d', strtotime('+1 days'));

        $data = $this->_getThreatsDatePerDay($member_id, $week_start, $week_end);
        
        $result['data'] = $data;
        $result['total'] = array_sum($data);
        $result['first_day'] = date('l', strtotime($week_start));
        $result['last_day'] = date('l');

        $datas = Yii::app()->db->createCommand("SELECT _getuserpercentileweek(". $member_id .") AS percentile;")->queryAll();
         
        if (count($datas) > 0)
            $adtrack_percentile = 100 - $datas[0]['percentile'];
        else
            $adtrack_percentile = 100;

        // round up to a multiple of 5
        $adtrack_percentile = $this->_roundUpTo5($adtrack_percentile);

        $result['percentile'] = $adtrack_percentile;

        $this->_sendResponse(200, CJSON::encode($result), $this->getResponseContentType());
    }
    
    private function getResponseContentType() {
      if (isset($_GET['html'])) {
        return 'text/html';
      }
      return 'application/json';
    }

    private function _roundUpTo5($value){
        $value = round($value);
        if($value % 5 != 0){
            $value += (5 - ($value % 5));
            if($value > 100) $value = 100;
        }

        return $value;
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
