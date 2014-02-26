<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'adtracks-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row adtracks_user_id user_id">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model, 'user_id', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row adtracks_member_id member_id">
		<?php echo $form->labelEx($model,'member_id'); ?>
		<?php echo $form->textField($model, 'member_id'); ?>
		<?php echo $form->error($model,'member_id'); ?>
		</div><!-- row -->
		<div class="row adtracks_adtracks_sources_id adtracks_sources_id">
		<?php echo $form->labelEx($model,'adtracks_sources_id'); ?>
		<?php echo $form->dropDownList($model, 'adtracks_sources_id', GxHtml::listDataEx(AdtracksSources::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'adtracks_sources_id'); ?>
		</div><!-- row -->
		<div class="row adtracks_domain domain">
		<?php echo $form->labelEx($model,'domain'); ?>
		<?php echo $form->textField($model, 'domain', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'domain'); ?>
		</div><!-- row -->
		<div class="row adtracks_url url">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textArea($model, 'url'); ?>
		<?php echo $form->error($model,'url'); ?>
		</div><!-- row -->
		<div class="row adtracks_usertime usertime">
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
		<div class="row adtracks_status status">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row adtracks_created_at created_at">
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
		<div class="row adtracks_updated_at updated_at">
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