<?php
include 'config.php';
?>
<?php
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
            'returnUrl' => array('/userData/index'),

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
			'url' => REDOCTOBER_URL,
			'port' => REDOCTOBER_PORT,
			'username' => REDOCTOBER_USERNAME,
			'password' => REDOCTOBER_PASSWORD,
			'owners' => REDOCTOBER_OWNERS,
			'minimun' => REDOCTOBER_MIN,
			'cert' => REDOCTOBER_CERT
		),
		
		'mail' => array(
		    'class' => 'ext.yii-mail.YiiMail',
		    'transportType'=>'smtp',
		    'viewPath' => 'application.views.mail',   
		    'logging' => true,
    		'dryRun' => false          
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
				array('api/deleteQueries', 'pattern'=>'api/queries/delete/<user_id:[\w-]+>', 'verb'=>'GET'),
				array('api/deleteQueries', 'pattern'=>'api/queries/delete/<user_id:\d+>', 'verb'=>'GET'),

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
		        
		        array('purchase/index', 'pattern'=>'user/purchase/<user_token:[a-zA-Z0-9+]+={0,2}>', 'verb'=>'GET'),
		        //array('purchase/response', 'pattern'=>'user/purchase/<user_token:[a-zA-Z0-9+]+={0,2}>/<token:[a-zA-Z0-9+]+={0,2}>', 'verb'=>'GET'),
		        
		        //Set friendly-url
		        '/' => 'site/index',
		        '/good-data' => 'goodData/index',
		        'apply'=>'/user/registration',
		        'share'=>'/site/purchase',
		        'share/thanks'=>'/purchase/thanks',
		        'sign-in'=>'/user/login',
		        'recover'=>'/user/recovery',
		        'good-data'=>'/goodData/index',
		        'evil-data'=>'/evilData/index',
		        'user-data'=>'/userData/index',
		        'membership'=>'/user/profile',
		        'product'=>'/site/product',
		        'partners'=>'/site/partners',
		        'your-company'=>'/site/company',
		        'support-us'=>'/donate',
		        'support-us/thanks'=>'/donate/thanks',
		        'coders'=>'/site/coders',
		        'faq'=>'/site/faq',
		        'legal'=>'/site/legal',	

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

			),
	
		),

		'db'=>array(
		    'tablePrefix' => 'tbl_',
	    	// 'connectionString' => 'pgsql:host=localhost'.';port=5432'.';dbname=tgd',
		    // 'username'=>'postgres',
		    // 'password'=> 'perrovaca',
		    'connectionString' => 'pgsql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_NAME,
				'username'=>BD_USERNAME,
				'password'=>BD_PASSWORD,
		    'charset'=>'UTF8',
		),

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
			),
		),
	),

	// application-level parameters that can be accessed
	'params'=>array(
		// this is used in contact page
		'senderGenericEmail'=>EMAIL_GENERIC_FROM,
		'senderPersonalEmail'=>EMAIL_PERSONAL_FROM,
		'adminEmail'=>EMAIL_ADMIN,
	),
);