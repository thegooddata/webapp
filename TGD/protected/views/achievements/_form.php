<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'achievements-form',
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
		<?php echo $form->labelEx($model,'achievement_type_id'); ?>
		<?php echo $form->dropDownList($model, 'achievement_type_id', GxHtml::listDataEx(AchievementsTypes::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'achievement_type_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'title_en_us'); ?>
		<?php echo $form->textField($model, 'title_en_us', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'title_en_us'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'title_es'); ?>
		<?php echo $form->textField($model, 'title_es', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'title_es'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'link_en_us'); ?>
		<?php echo $form->textField($model, 'link_en_us', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'link_en_us'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'link_es'); ?>
		<?php echo $form->textField($model, 'link_es', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'link_es'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'text_en_us'); ?>
		<?php echo $form->textArea($model, 'text_en_us'); ?>
		<?php echo $form->error($model,'text_en_us'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'text_es'); ?>
		<?php echo $form->textArea($model, 'text_es'); ?>
		<?php echo $form->error($model,'text_es'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'achievements_start'); ?>
		<?php echo $form->textField($model, 'achievements_start'); ?>
		<?php echo $form->error($model,'achievements_start'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'achievements_finish'); ?>
		<?php echo $form->textField($model, 'achievements_finish'); ?>
		<?php echo $form->error($model,'achievements_finish'); ?>
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