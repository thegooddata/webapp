<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="error">
    <h1>Error <?php echo $code; ?></h1>

    <div>
        <?php if($code == '404'): ?>
            <p>Page not found!</p>
        <?php else : ?>
            <p>Looks like something went wrong!</p>
            <p>We track these errors automatically. In the meantime, try refreshing.</p>
        <?php endif; ?>
    </div>
</div>
<style>
    .error{
        color: #00557b;
        font-family: ProximaNovaSoft-Regular,Arial,sans-serif;
        font-size: 1.5em;
        font-weight: normal;
        line-height: 100%;
        text-align: center;
    }
    .error h1 {
        font-size: 3em;
        margin: 50px 0;
    }
</style>