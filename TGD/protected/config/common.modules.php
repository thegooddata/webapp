<?php

return array(
    'admin',
    // uncomment the following to enable the Gii tool
    'redoctober' => array(
        'class' => 'ext.redoctober'
    ),
    'TGD' => array(
        'class' => 'ext.TGD'
    ),
    'gii' => array(
        'class' => 'system.gii.GiiModule',
        'password' => 'admin',
        // If removed, Gii defaults to localhost only. Edit carefully to taste.
        'ipFilters' => array('127.0.0.1', '::1'),
        'generatorPaths' => array(
            'ext.giix-core', // giix generators
        ),
    ),
    'user' => array(
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
);
