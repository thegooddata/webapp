<?php

$main=require(dirname(__FILE__).'/main.php');

// disable minScript locally
unset($main['controllerMap']['min']);
unset($main['components']['clientScript']['class']);
unset($main['components']['clientScript']['minScriptDisableMin']);

return CMap::mergeArray(
	$main,
	array(
		'components'=>array(
          
            'urlManager' => array(
                'showScriptName' => true, // required to keep in the url since we acces the website by index-test.php
            ),
        
            'db' => array(
                'enableProfiling'=>true,
                'enableParamLogging' => true,
            ),
            'log'=>array(
                'routes'=>array(
                        array(
                            'class'=>'ext.db_profiler.DbProfileLogRoute',
                            'countLimit' => 1, // How many times the same query should be executed to be considered inefficient
                            'slowQueryMin' => 0.01, // Minimum time for the query to be slow
                        ),
                ),
            ),
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			/* uncomment the following to provide test database connection
			'db'=>array(
				'connectionString'=>'DSN for test database',
			),
			*/
		),
	)
);
