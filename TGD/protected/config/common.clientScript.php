<?php

return array(
    'class' => 'ext.minScript.components.ExtMinScript',
    'minScriptDisableMin' => array('/[-\.]min\.(?:js)$/i'),
    //'optionName'=>'optionValue',
    'coreScriptPosition'=>CClientScript::POS_HEAD,
    'packages'=>array(
        'jquery'=>array(
          'baseUrl'=>'/themes/tgd/',
          'js'=>array('js/vendor/jquery-1.9.1.min.js'),
        ),
        'bootstrap'=>array(
          'baseUrl'=>'/themes/tgd/',
          'js'=>array(
              'js/bootstrap.js',
          ),
          'css'=>array(
              'css/vendor/bootstrap.min.css',
              'css/vendor/bootstrap_vertical_tabs.css',
          ),
          'depends'=>array('jquery'),
        ),
        'jcrop'=>array(
          'baseUrl'=>'/themes/tgd/',
          'js'=>array(
              'js/vendor/jquery.Jcrop.js',
          ),
          'css'=>array(
              'css/vendor/jquery.Jcrop.css',
          ),
          'depends'=>array('jquery'),
        ),
    ),
);
