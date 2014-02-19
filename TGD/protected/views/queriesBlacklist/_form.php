<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'queries-blacklist-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row queriesblacklist_lang lang">
		<?php echo $form->labelEx($model,'lang'); ?>
		<?php echo $form->textField($model, 'lang', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'lang'); ?>
		</div><!-- row -->
		<div class="row queriesblacklist_category category">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model, 'category', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'category'); ?>
		</div><!-- row -->
		<div class="row queriesblacklist_headword headword">
		<?php echo $form->labelEx($model,'headword'); ?>
		<?php echo $form->textField($model, 'headword', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'headword'); ?>
		</div><!-- row -->
		<div class="row queriesblacklist_midword midword">
		<?php echo $form->labelEx($model,'midword'); ?>
		<?php echo $form->textField($model, 'midword', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'midword'); ?>
		</div><!-- row -->
		<div class="row queriesblacklist_action action">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model, 'action', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'action'); ?>
		</div><!-- row -->
		<div class="row queriesblacklist_created_at created_at">
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
		<div class="row queriesblacklist_updated_at updated_at">
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