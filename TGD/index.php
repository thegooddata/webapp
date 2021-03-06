<?php

// change the following paths if necessary
$local_config = require(dirname(__FILE__).'/protected/config/local_config.php');
$yii= $local_config['yiiFrameworkPath'].'/yii.php';
$config = dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',$local_config['YII_DEBUG']);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
