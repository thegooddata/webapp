<?php

class Tools {
  
  /**
   * Explodes string into array and applies trim to each member of the array and 
   * if item value is empty it will be excluded.
   * @param string $delimiter
   * @param string $string
   * @return array
   */
  static public function explodeTrim($delimiter, $string) {
    $result=array();
    $items=explode($delimiter, $string);
    if (is_array($items)) {
      foreach ($items as $item) {
        $item=trim($item);
        if (!empty($item)) {
          $result[]=$item;
        }
      }
    }
    return $result;
  }
}
