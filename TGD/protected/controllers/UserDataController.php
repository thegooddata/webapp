<?php

class UserDataController extends Controller {

    public $bodyId = 'tgd-user-data';
    
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
    public function visualizar() {
        $this->layout = '//layouts/column1';

        $user_id = Yii::app()->user->id;

        $queries_pag = 0;
        $queries_pag_size = 10;

        if (isset($_GET['queries_pag']))
            $queries_pag = $_GET['queries_pag'];

        $queries = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*)')
                ->from('tbl_queries q')
                ->where(array(
                    'and',
                    'q.member_id = :value'), array(
                    ':value' => $user_id)
                )
                ->queryAll();

        $queries_total = $queries[0]->count;

        $queries = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('*')
                ->from('tbl_queries q')
                ->where(array(
                    'and',
                    'q.member_id = :value'), array(
                    ':value' => $user_id)
                )
                ->order('created_at desc')
                ->limit($queries_pag_size)
                ->offset($queries_pag * $queries_pag_size)
                ->queryAll();



        $browsing_pag = 0;
        $browsing_pag_size = 10;

        if (isset($_GET['browsing_pag']))
            $browsing_pag = $_GET['browsing_pag'];

        $browsing = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*)')
                ->from('tbl_browsing q')
                ->where(array(
                    'and',
                    'q.member_id = :value'), array(
                    ':value' => $user_id)
                )
                ->group('domain')
                ->queryAll();

        $browsing_total = count($browsing);

        $browsing = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('domain,count(*)')
                ->from('tbl_browsing q')
                ->where(array(
                    'and',
                    'q.member_id = :value'), array(
                    ':value' => $user_id)
                )
                ->order('count desc')
                ->group('domain')
                ->limit($browsing_pag_size)
                ->offset($browsing_pag * $browsing_pag_size)
                ->queryAll();

        $browsing_details = array();



        foreach ($browsing as $browse) {
            $domain = $browse->domain;

            $browsing_details[$domain] = Yii::app()->db->createCommand()
                    ->setFetchMode(PDO::FETCH_OBJ)
                    ->select('*')
                    ->from('tbl_browsing q')
                    ->where(array(
                        'and',
                        'q.member_id = :value',
                        'q.domain = :domain'), array(
                        ':value' => $user_id,
                        ':domain' => $domain)
                    )
                    ->order('created_at desc')
                    ->queryAll();
        }



        //COUNT QUERIES
        $member_id = $user_id;

        $datas = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*)')
                ->from('tbl_queries')
                ->where(array(
                    'and',
                    'member_id = :member_id',
                    'share = :share'
                        ), array(
                    'member_id' => $member_id,
                    'share' => 'true')
                )
                ->queryAll();

        $queries_count = $datas[0]->count;


        //PERCENTILE
        $member_id = $user_id;

        $datas = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('percentile')
                ->from('view_queries_members_percentil')
                ->where(array(
                    'and',
                    'member_id = :member_id'
                        ), array(
                    'member_id' => $member_id)
                )
                ->queryAll();

        if (count($datas) > 0)
            $queries_percentile = $datas[0]->percentile;
        else
            $queries_percentile = 0;

        $queries_percentile_text = "";

        if ($queries_percentile < 20)
            $queries_percentile_text = 'Owner';
        else if ($queries_percentile >= 20)
            $queries_percentile_text = 'Expert';


        // $loans = Yii::app()->db->createCommand()
        //            ->setFetchMode(PDO::FETCH_OBJ)
        //            ->select('*')
        //            ->from('tbl_queries q')
        //            ->where(array(
        //                        'and',
        //                        'q.member_id = :value'),
        //                array(
        //                        ':value'=>$user_id)
        //                )
        //            ->queryAll();


        $this->render('index', array(
            'queries' => $queries,
            'queries_size' => $queries_pag_size,
            'queries_total' => $queries_total,
            'queries_pag' => $queries_pag,
            'browsing' => $browsing,
            'browsing_details' => $browsing_details,
            'browsing_size' => $browsing_pag_size,
            'browsing_total' => $browsing_total,
            'browsing_pag' => $browsing_pag,
            'queries_count' => $queries_count,
            'queries_percentile_text' => $queries_percentile_text
                )
        );
    }

    public function actionDeleteQuery() {


        $id_query = $_GET['id_query'];
        $model = Queries::model()->findByPk($id_query);

        if ($model != null)
        {
            $flagger=new QueriesFlagged();
            $flagger->provider = $model->provider;
            $flagger->data= $model->data;
            $flagger->query= $model->query;
            $flagger->lang= $model->lang;
            $flagger->share= $model->share;
            $flagger->usertime= $model->usertime;
            $flagger->language_support= $model->language_support;
            $flagger->save();

            $model->delete();
        }

        $this->visualizar();
    }

    public function actionIndex() {
        $this->visualizar();
    }

    public function actionDeleteAllQueries(){
        $member_id = Yii::app()->user->id;
        Queries::model()->deleteAll('member_id IN (' . $member_id . ')');
        Browsing::model()->deleteAll('member_id IN (' . $member_id . ')');
         $this->visualizar();
    }

    public function actionDeleteQueries() {
        $member_id = Yii::app()->user->id;

        Queries::model()->deleteAll('member_id IN (' . $member_id . ')');
        $this->visualizar();
    }

    public function actionDeleteBrowsing() {
        $member_id = Yii::app()->user->id;

        Browsing::model()->deleteAll('member_id IN (' . $member_id . ')');
        $this->visualizar();
    }

    public function actionExportBrowsing() {

        Yii::import('ext.ECSVExport');

        $user_id = Yii::app()->user->id;

        //id,member_id,user_id,domain,url,usertime,created_at,updated_at
        $cmd = Yii::app()->db->createCommand("SELECT domain,url,usertime FROM tbl_browsing where member_id='" . $user_id . "' ");
        $csv = new ECSVExport($cmd);
        $content = $csv->toCSV();
        Yii::app()->getRequest()->sendFile('browsing.csv', $content, "text/csv", false);
    }

    public function actionExportQueries() {

        Yii::import('ext.ECSVExport');

        $user_id = Yii::app()->user->id;

        //id,member_id,user_id,provider,data,query,lang,share,usertime,created_at,updated_at
        $cmd = Yii::app()->db->createCommand("SELECT provider,data,query,lang,share,usertime FROM tbl_queries where member_id='" . $user_id . "' ");
        $csv = new ECSVExport($cmd);
        $content = $csv->toCSV();
        Yii::app()->getRequest()->sendFile('queries.csv', $content, "text/csv", false);
    }

}
