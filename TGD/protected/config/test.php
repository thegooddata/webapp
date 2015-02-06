<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
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
