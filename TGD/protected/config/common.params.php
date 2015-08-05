<?php

return array(
    
    // piwik settings
    'enableAnalytics'=> defined('ENABLE_ANALYTICS') ? ENABLE_ANALYTICS : false,
    'piwikURL'=>defined('PIWIK_URL') ? PIWIK_URL : '//piwik.thegooddata.org/',
    'piwikCookieDomain'=>defined('PIWIK_COOKIE_DOMAIN') ? PIWIK_COOKIE_DOMAIN : '*.thegooddata.org',
    'piwikDomains'=>defined('PIWIK_DOMAINS') ? PIWIK_DOMAINS : '*.thegooddata.org', // if more than one, separe by comma, ej: domain1.com, domain2.com
    
    // this is used in contact page
    'senderGenericEmailName' => EMAIL_GENERIC_FROM_NAME,
    'senderGenericEmail' => EMAIL_GENERIC_FROM,
    'senderPersonalEmail' => EMAIL_PERSONAL_FROM,
    'adminEmail' => EMAIL_ADMIN,
    'marcosEmail' => EMAIL_MARCOS_FROM,
    'membersEmail' => EMAIL_MEMBERS_FROM,
    'marcosEmailName' => EMAIL_MARCOS_FROM_NAME,
    'membersEmailName' => EMAIL_MEMBERS_FROM_NAME,
    'defaultCurrency'=>'GBP',
    'safeRedirectHosts'=>array(
        'www.tgd.local',
        'subdomain.tgd.local',
        'local.thegooddata.org',
        'www.thegooddata.org',
        'collaborate.thegooddata.org',
        'pre.thegooddata.org',
        'collaborate-pre.thegooddata.org',
    ),
    'dataThreatsYearCacheDuration'=>86400,
    'cacheLifespanOneDay'=>86400,
    'chromeExtensionUrl'=>'https://chrome.google.com/webstore/detail/elbfekgipcdaikbmepglnkghplljagkd',
    
    'incomePerSiteVisited' => 0.00002,
    'incomePerQuery' => 0.001,
);
