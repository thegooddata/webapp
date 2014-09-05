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

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'redoctober' => array(
			'class'=>'ext.redoctober'
		),

		'TGD' => array(
			'class'=>'ext.TGD'
		),

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
				'ext.giix-core', // giix generators
			),
		),
		
		'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',

            # send activation email
            'sendActivationMail' => true,

            # allow access for non-activated users
            'loginNotActiv' => false,

            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,

            # automatically login from registration
            'autoLogin' => true,

            # registration path
            'registrationUrl' => array('/user/registration'),

            # recovery password path
            'recoveryUrl' => array('/user/recovery'),

            # login form path
            'loginUrl' => array('/user/login'),

            # page after login
            'returnUrl' => array('/site/purchase'),

            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),

	),

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

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'WebUser',
		),
            
                'session'=>require(dirname(__FILE__).'/common.session.php'),
		
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'urlSuffix' => '',
			'rules'=>require(dirname(__FILE__).'/common.rules.php'),
		),

		'db'=>array(
		    'tablePrefix' => 'tbl_',
		    'connectionString' => 'pgsql:host=localhost;port=5432;dbname=tgd_webapp',
		    'username'=>'tgd',
		    'password'=>'tGdwA0101',
		    'charset'=>'UTF8',
		),
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
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	'params'=>require(dirname(__FILE__).'/common.params.php'),
);