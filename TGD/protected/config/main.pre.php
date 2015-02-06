<?php
include 'config.php';
?>
<?php
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'The Good Data',
	'id'=>'TGDPreAppId', /* required to maintain sessions between deployments */

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
            
        'session'=>require(dirname(__FILE__).'/common.session.php'),
        
        'cache'=>require(dirname(__FILE__).'/common.cache.php'),
		
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'urlSuffix' => '',
			'rules'=>require(dirname(__FILE__).'/common.rules.php'),
		),

		'db'=>array(
		    'tablePrefix' => 'tbl_',
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
	'params'=>require(dirname(__FILE__).'/common.params.php'),
);