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
  
  /**
   * getPercentile
   *
   * Finds the percentile of a given user/member.
   *
   * @param mixed $id The user ID (string) or member ID (integer)
   * @return float The percentile of the user.
   */
  static public function getPercentile($id) {
    $member_id = $id;
    if (!is_numeric($member_id))
    {
      $member_id = 0;
    }

    if ($member_id != 0)
    {
      $datas = Yii::app()->db->createCommand()
          ->setFetchMode(PDO::FETCH_OBJ)
          ->select('percentile')
          ->from('view_queries_members_percentil')
          ->where(array(
                      'and',
                      'member_id = :member_id'
                      ),
                      array(
                          'member_id'=>$member_id)
                      )
          ->queryAll();

        if (count($datas)>0)
        {
          return $datas[0]->percentile;
        }
      else
      {
        return 0;
      }
      
    }
    else
    {
      $user_id = $id;
      $datas = Yii::app()->db->createCommand()
          ->setFetchMode(PDO::FETCH_OBJ)
          ->select('percentile')
          ->from('view_queries_users_percentil')
          ->where(array(
                      'and',
                      'user_id = :user_id'
                      ),
                      array(
                          'user_id'=>$user_id)
                      )
          ->queryAll();

        if (count($datas)>0)
        {
          return $datas[0]->percentile;
        }
      else
      {
        return 0;
      }
    }
  }
  
  /**
   * getSeniorityLevelAndPercentile
   *
   * Gets the seniority level and percentile of a given user.
   *
   * @param mixed $id the member ID or user ID.
   * @return array An associative array containing the level and percentile.
   */
  static public function getSeniorityLevelAndPercentile($id) {
      
    $percentile = ADbHelper::getPercentile($id);
    $result = array('value' => $percentile, 'level' => '');

    $status = Yii::app()->user->user($id)->status;

    if(!Yii::app()->user->isGuest && $status == 2)
    {
      if(false /* TODO: find out a way to figure out if the user is a collaborator*/)
      {
        $result['level'] = 'Collaborator';
      }
      else
      {
        if($percentile < 20)
        {
          $result['level'] = 'Owner';
        }
        else
        {
          $result['level'] = 'Expert';
        }
      }
    }
    else
    {
      if($percentile < 5)
      {
        $result['level'] = 'Apprentice';
      }
      else
      {
        $result['level'] = 'Journeyman';
      }
    }

    return $result;
  }
}
?>