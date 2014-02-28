<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'members-pii-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row memberspii_id id">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'id'); ?>
		</div><!-- row -->
		<div class="row memberspii_firstname firstname">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model, 'firstname', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'firstname'); ?>
		</div><!-- row -->
		<div class="row memberspii_lastname lastname">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model, 'lastname', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'lastname'); ?>
		</div><!-- row -->
		<div class="row memberspii_streetname streetname">
		<?php echo $form->labelEx($model,'streetname'); ?>
		<?php echo $form->textField($model, 'streetname', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'streetname'); ?>
		</div><!-- row -->
		<div class="row memberspii_streetnumber streetnumber">
		<?php echo $form->labelEx($model,'streetnumber'); ?>
		<?php echo $form->textField($model, 'streetnumber', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'streetnumber'); ?>
		</div><!-- row -->
		<div class="row memberspii_streetdetails streetdetails">
		<?php echo $form->labelEx($model,'streetdetails'); ?>
		<?php echo $form->textField($model, 'streetdetails', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'streetdetails'); ?>
		</div><!-- row -->
		<div class="row memberspii_city city">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'city'); ?>
		</div><!-- row -->
		<div class="row memberspii_statecounty statecounty">
		<?php echo $form->labelEx($model,'statecounty'); ?>
		<?php echo $form->textField($model, 'statecounty', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'statecounty'); ?>
		</div><!-- row -->
		<div class="row memberspii_country country">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model, 'country', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'country'); ?>
		</div><!-- row -->
		<div class="row memberspii_postcode postcode">
		<?php echo $form->labelEx($model,'postcode'); ?>
		<?php echo $form->textField($model, 'postcode', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'postcode'); ?>
		</div><!-- row -->
		<div class="row memberspii_daybirthday daybirthday">
		<?php echo $form->labelEx($model,'daybirthday'); ?>
		<?php echo $form->textField($model, 'daybirthday', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'daybirthday'); ?>
		</div><!-- row -->
		<div class="row memberspii_monthbirthday monthbirthday">
		<?php echo $form->labelEx($model,'monthbirthday'); ?>
		<?php echo $form->textField($model, 'monthbirthday', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'monthbirthday'); ?>
		</div><!-- row -->
		<div class="row memberspii_yearbirthday yearbirthday">
		<?php echo $form->labelEx($model,'yearbirthday'); ?>
		<?php echo $form->textField($model, 'yearbirthday', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'yearbirthday'); ?>
		</div><!-- row -->
		<div class="row memberspii_agree agree">
		<?php echo $form->labelEx($model,'agree'); ?>
		<?php echo $form->checkBox($model, 'agree'); ?>
		<?php echo $form->error($model,'agree'); ?>
		</div><!-- row -->
		<div class="row memberspii_created_at created_at">
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
		<div class="row memberspii_updated_at updated_at">
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