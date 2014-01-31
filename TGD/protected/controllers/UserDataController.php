<?php

class UserDataController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */

	public function visualizar(){
		$this->layout='//layouts/column1';

		$user_id=Yii::app()->user->id;

		$queries_pag=0;
		$queries_pag_size=10;

		if (isset($_GET['queries_pag']))
			$queries_pag=$_GET['queries_pag'];
		
		$queries = Yii::app()->db->createCommand()
			                ->setFetchMode(PDO::FETCH_OBJ)
			                ->select('count(*)')
			                ->from('tbl_queries q')
			                ->where(array(
			                            'and',
			                            'q.member_id = :value'),
			                    array(
			                            ':value'=>$user_id)
			                    )
			                ->queryAll();

        $queries_total=$queries[0]->count;

		$queries = Yii::app()->db->createCommand()
			                ->setFetchMode(PDO::FETCH_OBJ)
			                ->select('*')
			                ->from('tbl_queries q')
			                ->where(array(
			                            'and',
			                            'q.member_id = :value'),
			                    array(
			                            ':value'=>$user_id)
			                    )
			                ->order('created_at desc')
			                ->limit($queries_pag_size)
                			->offset($queries_pag*$queries_pag_size)
			                ->queryAll();



        $browsing_pag=0;
		$browsing_pag_size=10;

		if (isset($_GET['browsing_pag']))
			$browsing_pag=$_GET['browsing_pag'];

		$browsing = Yii::app()->db->createCommand()
			                ->setFetchMode(PDO::FETCH_OBJ)
			                ->select('count(*)')
			                ->from('tbl_browsing q')
			                ->where(array(
			                            'and',
			                            'q.member_id = :value'),
			                    array(
			                            ':value'=>$user_id)
			                    )
			                ->group('domain')
			                ->queryAll();

	    $browsing_total=count($browsing);

    	$browsing = Yii::app()->db->createCommand()
			                ->setFetchMode(PDO::FETCH_OBJ)
			                ->select('domain,count(*)')
			                ->from('tbl_browsing q')
			                ->where(array(
			                            'and',
			                            'q.member_id = :value'),
			                    array(
			                            ':value'=>$user_id)
			                    )
			                ->order('count desc')
			                ->group('domain')
			                ->limit($browsing_pag_size)
                			->offset($browsing_pag*$browsing_pag_size)
			                ->queryAll();

    	$browsing_details=array();

        foreach ($browsing as $browse){
        	$domain=$browse->domain;

        	$browsing_details[$domain] = Yii::app()->db->createCommand()
			                ->setFetchMode(PDO::FETCH_OBJ)
			                ->select('*')
			                ->from('tbl_browsing q')
			                ->where(array(
			                            'and',
			                            'q.member_id = :value',
			                            'q.domain = :domain'),
			                    array(
			                            ':value'=>$user_id,
			                            ':domain'=>$domain)
			                    )
			                ->order('created_at desc')
			                ->queryAll(); 
        }

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


		$this->render('index',array(
			'queries'=>$queries,
			'queries_size'=>$queries_pag_size,
			'queries_total'=>$queries_total,
			'queries_pag'=>$queries_pag,

			'browsing'=>$browsing,
			'browsing_details'=>$browsing_details,
			'browsing_size'=>$browsing_pag_size,
			'browsing_total'=>$browsing_total,
			'browsing_pag'=>$browsing_pag

			)
		);
	}

	public function actionDeleteQuery(){

		
		$this->visualizar();
	}

	public function actionIndex()
	{
		$this->visualizar();
	}

	
}