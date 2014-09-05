<?php

return array(
//    'savePath' => '/some/writeable/path',
    'sessionName'=>SESSION_NAME,
    'autoStart' => true,
    'cookieMode' => 'allow',
    'cookieParams' => array(
      'path'=>'/',
      'domain' => COOKIE_DOMAIN,
    ),
);