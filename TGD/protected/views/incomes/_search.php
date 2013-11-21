<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'source_type'); ?>
		<?php echo $form->textField($model, 'source_type', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'source_name'); ?>
		<?php echo $form->textField($model, 'source_name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'gross_amount'); ?>
		<?php echo $form->textField($model, 'gross_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'expenses'); ?>
		<?php echo $form->textField($model, 'expenses'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'income_date'); ?>
		<?php echo $form->textField($model, 'income_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'currency'); ?>
		<?php echo $form->textField($model, 'currency', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'xrate_usd_spot'); ?>
		<?php echo $form->textField($model, 'xrate_usd_spot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'loan_reserved'); ?>
		<?php echo $form->textField($model, 'loan_reserved'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'updated_at'); ?>
		<?php echo $form->textField($model, 'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
