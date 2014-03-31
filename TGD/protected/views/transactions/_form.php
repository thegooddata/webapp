<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'transactions-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row transactions_transaction_id transaction_id">
		<?php echo $form->labelEx($model,'transaction_id'); ?>
		<?php echo $form->textField($model, 'transaction_id', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'transaction_id'); ?>
		</div><!-- row -->
		<div class="row transactions_type type">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model, 'type', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'type'); ?>
		</div><!-- row -->
		<div class="row transactions_status status">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row transactions_currency currency">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model, 'currency', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'currency'); ?>
		</div><!-- row -->
		<div class="row transactions_amount amount">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model, 'amount', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'amount'); ?>
		</div><!-- row -->
		<div class="row transactions_member_id member_id">
		<?php echo $form->labelEx($model,'member_id'); ?>
		<?php echo $form->textField($model, 'member_id'); ?>
		<?php echo $form->error($model,'member_id'); ?>
		</div><!-- row -->
		<div class="row transactions_created_at created_at">
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
		<div class="row transactions_updated_at updated_at">
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