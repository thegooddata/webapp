<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'queries-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'member_id'); ?>
		<?php echo $form->textField($model, 'member_id'); ?>
		<?php echo $form->error($model,'member_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model, 'user_id', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'provider'); ?>
		<?php echo $form->textField($model, 'provider', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'provider'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model, 'data', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'data'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'query'); ?>
		<?php echo $form->textArea($model, 'query'); ?>
		<?php echo $form->error($model,'query'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lang'); ?>
		<?php echo $form->textField($model, 'lang', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'lang'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'share'); ?>
		<?php echo $form->textField($model, 'share', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'share'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'usertime'); ?>
		<?php echo $form->textField($model, 'usertime'); ?>
		<?php echo $form->error($model,'usertime'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model, 'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->