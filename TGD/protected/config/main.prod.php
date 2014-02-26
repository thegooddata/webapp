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
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
        'application.modules.user.components.*',

        'ext.yii-mail.YiiMailMessage',
        'ext.giix-components.*',

        'ext.Mailchimp.*',
        'ext.CSVExport',
	),

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
            'returnUrl' => array('/user/profile'),

            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),

	),

	// application components
	'components'=>array(
		'redoctober' => array(
			'class' => 'ext.redoctober',
			'url' => 'https://www.thegooddata.org:8080',
			'username' => 'dani',
			'password' => 'dani',
			'owners' => '"user1","user2"',
			'minimun' => 2,
			'cert' => "/etc/ssl/certs/thegooddata.org.crt"
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
		
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'urlSuffix' => '',
			'rules'=>array(

				// REST patterns
				array('api/count', 'pattern'=>'api/<model:\w+>/count', 'verb'=>'GET'),
				array('api/count', 'pattern'=>'api/<model:\w+>/count/<user_id:[\w-]+>', 'verb'=>'GET'),

				array('api/percentil', 'pattern'=>'api/<model:\w+>/percentile/<user_id:[\w-]+>', 'verb'=>'GET'),
				array('api/percentil', 'pattern'=>'api/<model:\w+>/percentile/<user_id:\d+>', 'verb'=>'GET'),

		        array('api/list', 'pattern'=>'api/<model:\w+>', 'verb'=>'GET'),
		        array('api/view', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'GET'),
		        array('api/view', 'pattern'=>'api/<model:\w+>/<query:[\w  \%\-]+>', 'verb'=>'GET'),
		        array('api/view', 'pattern'=>'api/<model:\w+>/<lang:[\w  \%\-]+>/<query:[\w  \%\-]+>', 'verb'=>'GET'),
		        
		        array('api/update', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
		        array('api/update', 'pattern'=>'api/<model:\w+>/<user_id:[\w-]+>/', 'verb'=>'PUT'),
		        array('api/update', 'pattern'=>'api/<model:\w+>/<user_id:[\w-]+>/<member_id:\d*>', 'verb'=>'PUT'),

		        array('api/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
		        array('api/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'),
		        
		        //Set friendly-url
		        '/' => 'site/index',
		        
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
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
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);