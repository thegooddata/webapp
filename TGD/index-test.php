<?php

if ($_SERVER['SERVER_NAME'] !== 'www.tgd.local') {
  die('index-test.php only allowed for www.tgd.local host');
}

// change the following paths if necessary
$local_config = require(dirname(__FILE__).'/protected/config/local_config.php');
$yii= $local_config['yiiFrameworkPath'].'/yii.php';
$config = dirname(__FILE__).'/protected/config/test.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', $local_config['YII_DEBUG']);

require_once($yii);
Yii::createWebApplication($config)->run();
