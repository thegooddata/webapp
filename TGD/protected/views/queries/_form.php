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

		<div class="row queries_member_id member_id">
		<?php echo $form->labelEx($model,'member_id'); ?>
		<?php echo $form->textField($model, 'member_id'); ?>
		<?php echo $form->error($model,'member_id'); ?>
		</div><!-- row -->
		<div class="row queries_user_id user_id">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model, 'user_id', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row queries_provider provider">
		<?php echo $form->labelEx($model,'provider'); ?>
		<?php echo $form->textField($model, 'provider', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'provider'); ?>
		</div><!-- row -->
		<div class="row queries_data data">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model, 'data', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'data'); ?>
		</div><!-- row -->
		<div class="row queries_query query">
		<?php echo $form->labelEx($model,'query'); ?>
		<?php echo $form->textArea($model, 'query'); ?>
		<?php echo $form->error($model,'query'); ?>
		</div><!-- row -->
		<div class="row queries_lang lang">
		<?php echo $form->labelEx($model,'lang'); ?>
		<?php echo $form->textField($model, 'lang', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'lang'); ?>
		</div><!-- row -->
		<div class="row queries_share share">
		<?php echo $form->labelEx($model,'share'); ?>
		<?php echo $form->textField($model, 'share', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'share'); ?>
		</div><!-- row -->
		<div class="row queries_usertime usertime">
		<?php echo $form->labelEx($model,'usertime'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'usertime',
			'value' => $model->usertime,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'usertime'); ?>
		</div><!-- row -->
		<div class="row queries_language_support language_support">
		<?php echo $form->labelEx($model,'language_support'); ?>
		<?php echo $form->textField($model, 'language_support', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'language_support'); ?>
		</div><!-- row -->
		<div class="row queries_created_at created_at">
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
		<div class="row queries_updated_at updated_at">
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