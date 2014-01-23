<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'varname'); ?>
		<?php echo $form->textField($model, 'varname', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'field_type'); ?>
		<?php echo $form->textField($model, 'field_type', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'field_size'); ?>
		<?php echo $form->textField($model, 'field_size', array('maxlength' => 15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'field_size_min'); ?>
		<?php echo $form->textField($model, 'field_size_min', array('maxlength' => 15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'required'); ?>
		<?php echo $form->textField($model, 'required'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'match'); ?>
		<?php echo $form->textField($model, 'match', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'range'); ?>
		<?php echo $form->textField($model, 'range', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'error_message'); ?>
		<?php echo $form->textField($model, 'error_message', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'other_validator'); ?>
		<?php echo $form->textField($model, 'other_validator', array('maxlength' => 5000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'default_value'); ?>
		<?php echo $form->textField($model, 'default_value', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'widget'); ?>
		<?php echo $form->textField($model, 'widget', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'widgetparams'); ?>
		<?php echo $form->textField($model, 'widgetparams', array('maxlength' => 5000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'position'); ?>
		<?php echo $form->textField($model, 'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'visible'); ?>
		<?php echo $form->textField($model, 'visible'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
