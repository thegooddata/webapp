<?php
include dirname(__FILE__).'/config.php';

?>
<?php
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
	    	// 'connectionString' => 'pgsql:host=localhost'.';port=5432'.';dbname=tgd',
		    // 'username'=>'postgres',
		    // 'password'=> 'perrovaca',
		    'connectionString' => 'pgsql:host='.BD_HOST.';port='.BD_PORT.';dbname='.BD_NAME.';sslmode='.BD_SSL_MODE.';',
				'username'=>BD_USERNAME,
				'password'=>BD_PASSWORD,
		    'charset'=>'UTF8',
		)),

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
