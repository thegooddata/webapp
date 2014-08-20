<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'loans-leaders-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row loansleaders_name_en name_en">
		<?php echo $form->labelEx($model,'name_en'); ?>
		<?php echo $form->textField($model, 'name_en', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name_en'); ?>
		</div><!-- row -->
		<div class="row loansleaders_name_es name_es">
		<?php echo $form->labelEx($model,'name_es'); ?>
		<?php echo $form->textField($model, 'name_es', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name_es'); ?>
		</div><!-- row -->

		
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->