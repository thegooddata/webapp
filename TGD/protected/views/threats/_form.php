<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'threats-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'member_id'); ?>
		<?php echo $form->dropDownList($model, 'member_id', GxHtml::listDataEx(Members::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'member_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'service_id'); ?>
		<?php echo $form->dropDownList($model, 'service_id', GxHtml::listDataEx(ThreatsSources::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'service_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'domain'); ?>
		<?php echo $form->textField($model, 'domain', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'domain'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textArea($model, 'url'); ?>
		<?php echo $form->error($model,'url'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->