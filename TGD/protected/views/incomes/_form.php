<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'incomes-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'source_type'); ?>
		<?php echo $form->textField($model, 'source_type', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'source_type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'source_name'); ?>
		<?php echo $form->textField($model, 'source_name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'source_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'gross_amount'); ?>
		<?php echo $form->textField($model, 'gross_amount'); ?>
		<?php echo $form->error($model,'gross_amount'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'expenses'); ?>
		<?php echo $form->textField($model, 'expenses'); ?>
		<?php echo $form->error($model,'expenses'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'income_date'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'income_date',
			'value' => $model->income_date,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'income_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model, 'currency', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'currency'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'xrate_usd_spot'); ?>
		<?php echo $form->textField($model, 'xrate_usd_spot'); ?>
		<?php echo $form->error($model,'xrate_usd_spot'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'loan_reserved'); ?>
		<?php echo $form->textField($model, 'loan_reserved'); ?>
		<?php echo $form->error($model,'loan_reserved'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'created_at',
			'value' => $model->created_at,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'created_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'updated_at',
			'value' => $model->updated_at,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'updated_at'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->