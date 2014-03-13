<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
);
?>

<h1><?php echo UserModule::t("Restore"); ?></h1>

<?php if ($success != "") { ?>   
    <p>SUCCESS : <?php echo $success; ?>
<?php } ?>

<?php if ($error != "") { ?>   
    <p>ERROR : <?php echo $error; ?>
<?php } ?>

<div class="form">

	<p>Enter your registered email. If you have not provided us with an email when you registered as a member, please read <a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/faq");?>">this</a>.</p>
<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="row">
		<?php echo CHtml::activeLabel($form,'email'); ?>
		<?php echo CHtml::activeTextField($form,'login_or_email') ?>
	</div>
	
	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Submit")); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->