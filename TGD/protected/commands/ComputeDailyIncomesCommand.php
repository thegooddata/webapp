<?php
//    * 04 * * * /usr/bin/php /srv/webapp/current/protected/yiic.php ComputeDailyIncomes 1>&2

/**
 * Calculates daily incomes assuming the following:
 * - per site visited => $0.00002
 * - per query => $0.001
 */
class ComputeDailyIncomesCommand extends CConsoleCommand{
	
    private $_beginDate;

    private $_endDate;

    private $_tables = array("browsing", "queries");


    private function _getDailyData($type) {
        if(!in_array($type, $this->_tables)){
            print("The table provided is not available.");
            return 0;
        }

        $result = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select('count(*)')
                ->from('tbl_'.$type)
                ->where('created_at > :begin AND created_at <= :end', array(':begin'=>$this->_beginDate, ':end'=> $this->_endDate))
                ->queryScalar();

        return $result;
            
    }

    private function _insertIncome($amount){

        $insertId = Yii::app()->db->createCommand()
            ->select("id")
            ->from("tbl_incomes")
            ->where("income_date = :date", array(":date" => $this->_endDate))
            ->queryScalar();


        $command = Yii::app()->db->createCommand();

        if($insertId === false){
            $result = $command->insert('tbl_incomes', array(
                        'type'         => 2,
                        'income_date'  => $this->_endDate,
                        'source_name'  => 'Queries plus visits',
                        'gross_amount' => $amount,
                        'currency'     => 1 ));
            print("> inserting : ");
        } else {
            $result = $command->update('tbl_incomes', array(
                        'type'         => 2,
                        'income_date'  => $this->_endDate,
                        'source_name'  => 'Queries plus visits',
                        'gross_amount' => $amount,
                        'currency'     => 1 
                    ),"id = :id", array(":id" => $insertId));
            print("> updating : ");

        }
        return $result;
    }

    /**
     * Default command action.
     * 
     * @return integer 0 for success, 1 for failure.
     */
    public function actionIndex() {
        // set date limits for queries
        $this->_endDate    = date('Y-m-d 00:00:00');
        $this->_beginDate  = date('Y-m-d 00:00:00', strtotime("-24 hours"));
        
        // query for visits
        $totalVisits       = $this->_getDailyData("browsing");
        $totalVisitsValue  = $totalVisits * Yii::app()->params['incomePerSiteVisited'];
        
        // query for queries
        $totalQueries      = $this->_getDailyData("queries");
        $totalQueriesValue = $totalQueries * Yii::app()->params['incomePerQuery'];
        
        // insert result
        $totalValue        = $totalVisitsValue+$totalQueriesValue;
        $result            = $this->_insertIncome($totalValue);
        $totalValue        = ($result > 0)? '$'.$totalValue : 'FAILED TO STORE IN DB';

        print("$totalVisits visits, $totalQueries queries registered on ".explode(' ', $this->_beginDate)[0]." ($totalValue)\n");

        return ($result)>0? 1 : 0;
	}
}

