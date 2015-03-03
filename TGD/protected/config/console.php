<?php

// including config with constants
include dirname(__FILE__).'/config.php';

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'The Good Data - Console app',

	// preloading 'log' component
	'preload'=>array('log'),
	
	// autoloading model and component classes
	'import'=>require(dirname(__FILE__).'/common.import.php'),

	// application components
	'components'=>array(
		'db'=>CMap::mergeArray(require(dirname(__FILE__).'/common.db.php'), array(
		    'tablePrefix' => 'tbl_',
	    	'connectionString' => 'pgsql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_NAME.';sslmode=require;',
		    'username'=>BD_USERNAME,
		    'password'=>BD_PASSWORD,
		    'charset'=>'UTF8',
		)),
		'log'=>CMap::mergeArray(require(dirname(__FILE__).'/common.log.php'), array(
        )),
        'cache'=>require(dirname(__FILE__).'/common.cache.php'),
	),
);