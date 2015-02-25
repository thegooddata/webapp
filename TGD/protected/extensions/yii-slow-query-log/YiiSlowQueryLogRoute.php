<?php

/**
 * Database slow query logger
 *
 * Saves the slow queries into a databse table instead of displaying them 
 * on screen.
 *
 * Inspired in original dbprofiler extension by Alexander Makarov, Sam Dark:
 * http://www.yiiframework.com/extension/dbprofiler/
 * @author Alex https://github.com/thegooddata
 * @version 1.0
 */
class YiiSlowQueryLogRoute extends CProfileLogRoute {

  /**
   * @var int How many times the same query should be executed to be considered inefficient
   */
  public $countLimit = 1;

  /**
   * @var float Minimum time for the query to be slow
   */
  public $slowQueryMin = 0.01;

  /**
   * Displays the summary report of the profiling result.
   * @param array $logs list of logs
   */
  protected function displaySummary($logs) {
    $stack = array();
    foreach ($logs as $log) {
      if ($log[1] !== CLogger::LEVEL_PROFILE || substr($log[2], 0, strlen('system.db.CDbCommand')) !== 'system.db.CDbCommand')
        continue;

      $message = $log[0];
      if (!strncasecmp($message, 'begin:', 6)) {
        $log[0] = substr($message, 6);
        $stack[] = $log;
      } else if (!strncasecmp($message, 'end:', 4)) {
        $token = substr($message, 4);
        if (($last = array_pop($stack)) !== null && $last[0] === $token) {
          $token = str_replace($log[2], '', $token);
          $token = trim($token, '()');

          $delta = $log[3] - $last[3];
          if (!$this->groupByToken)
            $token = $log[2];
          if (isset($results[$token]))
            $results[$token] = $this->aggregateResult($results[$token], $delta);
          else
            $results[$token] = array($token, 1, $delta, $delta, $delta);
        } else
          throw new CException(Yii::t('yii', 'CProfileLogRoute found a mismatching code block "{token}". Make sure the calls to Yii::beginProfile() and Yii::endProfile() be properly nested.', array('{token}' => $token)));
      }
    }

    $now = microtime(true);
    while (($last = array_pop($stack)) !== null) {
      $delta = $now - $last[3];
      $token = $this->groupByToken ? $last[0] : $last[2];
      if (isset($results[$token]))
        $results[$token] = $this->aggregateResult($results[$token], $delta);
      else
        $results[$token] = array($token, 1, $delta, $delta, $delta);
    }

    $entries = array_values($results);
    $func = create_function('$a,$b', 'return $a[4]<$b[4]?1:0;');
    usort($entries, $func);

    $this->saveToDb($entries);
  }

  private function saveToDb($entries) {
    $command = Yii::app()->db->createCommand();
    foreach ($entries as $entry) {

      $query = trim($entry[0]);
      $count = $entry[1];
      $min = sprintf('%0.5f', $entry[2]);
      $max = sprintf('%0.5f', $entry[3]);
      $total = sprintf('%0.5f', $entry[4]);
      $average = sprintf('%0.5f', $entry[4] / $count);

      if ($max > $this->slowQueryMin || $count > $this->countLimit) {

        $command->insert('{{slow_query_log}}', array(
            'query' => $query,
            'count' => $count,
            'total_s' => $total,
            'avg_s' => $average,
            'min_s' => $min,
            'max_s' => $max,
        ));
      }
    }
  }

}
