<?php
$title=((isset($this->pageTitle))?$this->pageTitle.' - ':'')."TheGoodData | Enjoy your data";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo CHtml::encode($this->pageDescription); ?>">
        <meta name="author" content="">
        <meta name="title" content="<?php echo CHtml::encode($title); ?>">
        
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico"> 
        <link rel="chrome-webstore-item" href="<?php echo Yii::app()->params['chromeExtensionUrl']; ?>">

        <title><?php echo CHtml::encode($title); ?></title>

        <?php
        $cs=Yii::app()->clientScript;
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/notification.css');
        ?>

    </head>

    <body>
        <!-- main content -->

        <?php echo $content; ?>

        <!-- END main content -->         
    </body>
</html>
