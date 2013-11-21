<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'achievements-types-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name_en_us'); ?>
		<?php echo $form->textField($model, 'name_en_us', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name_en_us'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name_es'); ?>
		<?php echo $form->textField($model, 'name_es', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name_es'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'icon'); ?>
		<?php echo $form->textField($model, 'icon', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'icon'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('achievements')); ?></label>
		<?php echo $form->checkBoxList($model, 'achievements', GxHtml::encodeEx(GxHtml::listDataEx(Achievements::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->