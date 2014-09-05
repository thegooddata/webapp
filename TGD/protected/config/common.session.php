<?php

return array(
//    'savePath' => '/some/writeable/path',
    'sessionName'=>'TGDSESSID',
    'autoStart' => true,
    'cookieMode' => 'allow',
    'cookieParams' => array(
      'path'=>'/',
      'domain' => COOKIE_DOMAIN,
    ),
);