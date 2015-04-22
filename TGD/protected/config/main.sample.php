<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'The Good Data',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>require(dirname(__FILE__).'/common.import.php'),

	'theme'=>'tgd',

	'modules'=>require(dirname(__FILE__).'/common.modules.php'),

	// application components
	'components'=>array(
	  'stripe' => array(
			'class' => 'ext.yii-stripe.YiiStripe',
			'test' => STRIPE_TEST,
			'secret_key' => STRIPE_SK,
			'publishable_key' => STRIPE_PK,
	  ),
	  'openAtrium' => array(
			'class' => 'ext.OpenAtrium',
			'host' => OPENATRIUM_HOST,
			'adminLogin' => OPENATRIUM_ADMIN_LOGIN,
			'adminPassword' => OPENATRIUM_PASSWORD,
	  ),
		'redoctober' => array(
			'class' => 'ext.redoctober',
			'url' => 'https://www.thegooddata.org:8080',
			'username' => 'username',
			'password' => 'password',
			'owners' => '"user1","user2"',
			'minimun' => 2,
			'cert' => "/path/ssl/certs/tgd.org.crt"
		),

		'mail' => array(
		    'class' => 'ext.yii-mail.YiiMail',
		    'transportType'=>'smtp',
		    'transportOptions'=>array(
		            'host'=>'host',
		            'username'=>'username',
		            'password'=>'password',
		            'port'=>'25',                       
		    ),
		    'viewPath' => 'application.views.mail',             
		),

        'geoip' => array(
            'class' => 'application.extensions.geoip.CGeoIP',
            // specify filename location for the corresponding database
            'filename' => dirname(__FILE__).'/..'.GEOIP_DAT_PATH,
            // Choose MEMORY_CACHE or STANDARD mode
            'mode' => 'STANDARD',
        ),

        'clientScript'=>require(dirname(__FILE__).'/common.clientScript.php'),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'WebUser',
		),
            
        'session'=>require(dirname(__FILE__).'/common.session.php'),
        
        'cache'=>require(dirname(__FILE__).'/common.cache.php'),
		
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'urlSuffix' => '',
			'rules'=>require(dirname(__FILE__).'/common.rules.php'),
		),

		'db'=>CMap::mergeArray(require(dirname(__FILE__).'/common.db.php'), array(
		    'tablePrefix' => 'tbl_',
		    'connectionString' => 'pgsql:host=localhost;port=5432;dbname=tgd_webapp',
		    'username'=>'tgd',
		    'password'=>'tGdwA0101',
		    'charset'=>'UTF8',
		)),
		// 'db'=>array(
		// 	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>CMap::mergeArray(require(dirname(__FILE__).'/common.log.php'), array(
        )),
	),

    'controllerMap'=>array(
        'min'=>array(
            'class'=>'ext.minScript.controllers.ExtMinScriptController',
            //'optionName'=>'optionValue',
        ),
    ),

	// application-level parameters that can be accessed
	'params'=>require(dirname(__FILE__).'/common.params.php'),
);