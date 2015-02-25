<?php

return array(
    'enableProfiling' => (defined('SLOW_QUERY_LOG') && SLOW_QUERY_LOG === true) ? true : false,
//    'enableParamLogging' => (defined('SLOW_QUERY_LOG') && SLOW_QUERY_LOG===true) ? true : false, // by default let's not log params
);
