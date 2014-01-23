<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'profiles-fields-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'varname'); ?>
		<?php echo $form->textField($model, 'varname', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'varname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'title'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'field_type'); ?>
		<?php echo $form->textField($model, 'field_type', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'field_type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'field_size'); ?>
		<?php echo $form->textField($model, 'field_size', array('maxlength' => 15)); ?>
		<?php echo $form->error($model,'field_size'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'field_size_min'); ?>
		<?php echo $form->textField($model, 'field_size_min', array('maxlength' => 15)); ?>
		<?php echo $form->error($model,'field_size_min'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'required'); ?>
		<?php echo $form->textField($model, 'required'); ?>
		<?php echo $form->error($model,'required'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'match'); ?>
		<?php echo $form->textField($model, 'match', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'match'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'range'); ?>
		<?php echo $form->textField($model, 'range', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'range'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'error_message'); ?>
		<?php echo $form->textField($model, 'error_message', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'error_message'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'other_validator'); ?>
		<?php echo $form->textField($model, 'other_validator', array('maxlength' => 5000)); ?>
		<?php echo $form->error($model,'other_validator'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'default_value'); ?>
		<?php echo $form->textField($model, 'default_value', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'default_value'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'widget'); ?>
		<?php echo $form->textField($model, 'widget', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'widget'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'widgetparams'); ?>
		<?php echo $form->textField($model, 'widgetparams', array('maxlength' => 5000)); ?>
		<?php echo $form->error($model,'widgetparams'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model, 'position'); ?>
		<?php echo $form->error($model,'position'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'visible'); ?>
		<?php echo $form->textField($model, 'visible'); ?>
		<?php echo $form->error($model,'visible'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->