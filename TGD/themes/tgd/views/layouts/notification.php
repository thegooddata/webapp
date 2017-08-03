<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo (isset($this->pageDescription))?$this->pageDescription:'TheGoodData helps you enjoy the benefits of being a data owner. Its browser extension will improve your privacy by blocking data threats that track you online.';?> 
        <meta name="keywords" content="privacy, trackers, block trackers, online privacy, data privacy, data ownership, data protection, data for good, good data, value of data, data locker, data vault, secure vault, data assistant, personal data assistant, social good, philanthropy, donating, donation, charity, social development, economic development, grassroots development, poverty alleviation, social investment, social entrepreneurship, innovation, data cooperative">
        <meta name="author" content="">
        <meta name="title" content="TheGoodData | Enjoy your data <?php echo (isset($this->pageTitle))?$this->pageTitle:'';?>">
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico"> 
        <!--<link rel="chrome-webstore-item" href="<?php // echo Yii::app()->params['chromeExtensionUrl']; ?>">-->

        <title>TheGoodData | Enjoy your data <?php echo (isset($this->pageTitle))?$this->pageTitle:'';?></title>

        <?php
        $cs=Yii::app()->clientScript;      
//        $cs->registerCoreScript('jquery');
//        $cs->registerPackage('bootstrap');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/notification.css');
        ?>

    </head>

    <body>
        <!-- main content -->

        <?php echo $content; ?>

        <!-- END main content -->         
    </body>
</html>
