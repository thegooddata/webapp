<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExcelHelper
 *
 * @author Alejandro
 */
class ExcelHelper {
  static public function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    $str = mb_convert_encoding($str, 'UTF-16LE', 'UTF-8');
  }

  static public function sendData($tableName, $columns = array())
  {
  	$filename = $tableName."_".date('Ymd').".csv";
  	$fullPath = Yii::app()->getBasePath()."/../uploads/".$filename;
  	$tableName = 'tbl_'.$tableName;

  	$count = Yii::app()->db->createCommand()
  	                       ->select('COUNT(*)')
  	                       ->from($tableName)
  	                       ->queryScalar();
 
  	if($count < 3000){
  		$pageSize = $count;
  		$pages = 1;
  	}else{
	  	$pageSize = floor($count/(10*log($count)));
	  	$pages = ceil($count / $pageSize);	
  	}
  	
  	if(!is_array($columns) || count($columns) == 0){
  		$columns = '*';
  	}else{
  		$columns = join(', ',$columns);
  	}
  	
  	$content = "";
  	for($i=0;$i<$pages;$i++){
  		$provider = Yii::app()->db->createCommand()
  		                     ->select($columns)
  		                     ->from($tableName)
  		                     ->limit($pageSize,$i*$pageSize)
  		                     ->queryAll();
  		
		$csv = new CSVExport($provider);
		$csv->setToAppend();
		$content = $csv->toCSV($fullPath,null,null,$i==0);	
	}

	Yii::app()->getRequest()->sendFile($filename, file_get_contents($fullPath), "text/csv", false);
	ignore_user_abort(true);
	unlink($fullPath);
	
	Yii::app()->end();       
  }
}
