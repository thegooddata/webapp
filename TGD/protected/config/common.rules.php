<?php

return array(

	// REST patterns
	array('api/login', 'pattern'=>'api/login', 'verb'=>'POST'),
	array('api/getLoggedUser', 'pattern'=>'api/getLoggedUser', 'verb'=>'POST'),
	
	array('api/saveUserSettings', 'pattern'=>'api/saveUserSettings', 'verb'=>'POST'),
	
  array('api/addToBrowserPHPList', 'pattern'=>'api/phplist/add/<user_email:[\w+.@_-]+>/<list:(\d+|[\w+])+>', 'verb'=>'GET'),
  //array('api/moveUser', 'pattern'=>'api/phplist/move/<user_email:[\w+.@_-]>/<from:\d+>/<to:\d+>', 'verb'=>'GET'),

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
      
  // Set friendly-urls
  '/' => 'site/index',
  '/good-data' => 'goodData/index',
  'apply'=>'/user/registration',
  //'share/thanks'=>'/purchase/thanks', // think this is old and should be removed
  'sign-in'=>'/user/login',
  'recover'=>'/user/recovery',
  'resignation'=>'/user/resignation',
  'resignation/thanks'=>'/user/resignation/thanks',
  'good-data'=>'/goodData/index',
  'evil-data'=>'/evilData/index',
  'your-data'=>'/userData/index',
  'membership'=>'/user/profile',
  'product'=>'/site/product',
  'partners'=>'/site/partners',
  'suggestion'=>'/site/suggestion',
  'suggestion/ajax'=>'/site/suggestion/ajax/1',
  'suggestion/thanks'=>'/site/suggestionThanks',
  'suggestion/thanks/ajax'=>'/site/suggestionThanks/ajax/1',
  'your-company'=>'/site/company',
  'support-us'=>'/donate/index',
  'support-us/thanks'=>'/donate/thanks',
  'coders'=>'/site/coders',
  'faq'=>'/site/faq',
  'legal'=>'/site/legal',	
  'get-your-share'=>'/purchase/index',
  'get-your-share/not-applicable'=>'/purchase/notApplicable',
  'get-your-share/thanks'=> '/purchase/thanks',
  'robots.txt'=>'/site/robots',
  'interest'=>'/interest/index',

	'<controller:\w+>/<id:\d+>'=>'<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

);