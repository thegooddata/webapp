<?php

/**
 * This class is used for some common database functions.
 *
 * TODO: If you have only one query that doesn't end in ';' nothing will be executed.
 *
 */
class ADbHelper {

  /**
   * Split a sql script into queries and execute them all in a transaction.
   * @param string $script
   * @return bool True if queries were successfull.
   */
  static public function executeSqlScript($script='') {
    // array to store all queries
    $queries=array();
    // current query
    $query='';
    if (strlen($script) > 0) {
      $lines=explode("\n", $script);
      foreach ($lines as $line) {
        $line=trim($line); // remove white spaces
        if (strlen($line) > 0) { // check empty
          if (!Tools::StartsWith($line, '--')) { // check comments
            $query .= "\n".$line; // add line to current query
            if (preg_match("/;[\040]*\$/", $line)) { // check if last line of queri that ends in ';'
              $query=trim($query); // remove white spaces
              $query=rtrim($query,";"); // remove ending ';'
              $queries[]=$query; // add to queries list
              $query=''; // clean current query
            }
          }
        }
      }

      // append the last query
      if (strlen($query) > 0) {
        $query=trim($query); // remove white spaces
        $queries[]=$query; // add to queries list
        $query=''; // clean current query
      }

      // execute them all in transaction
      if (count($queries) > 0) {
        $transaction=Yii::app()->db->beginTransaction();
        try
        {
          foreach ($queries as $query) {
            Yii::app()->db->createCommand($query)->execute();
          }
          $transaction->commit();
        }
        catch(Exception $e)
        {
            echo "Exception: ".$e->getMessage()."\n";
            $transaction->rollback();
            return false;
        }
      }
//      Tools::print_pre($lines);
//      Tools::print_pre($queries);
    }
    return true;
  }
  
  static public function getPercentile($id) {
    
  }
  
  static public function getSeniorityLevelAndPercentile($id) {
    
  }
}
?>