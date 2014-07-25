<?php

// change the following paths if necessary
$local_config = require(dirname(__FILE__).'/config/local_config.php');
$yiic= $local_config['yiiFrameworkPath'].'/yiic.php';
$config=dirname(__FILE__).'/config/console.php';

require_once($yiic);
