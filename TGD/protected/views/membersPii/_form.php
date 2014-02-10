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

		<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model, 'firstname', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'firstname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'surname'); ?>
		<?php echo $form->textField($model, 'surname', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'surname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'streetnumber'); ?>
		<?php echo $form->textField($model, 'streetnumber', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'streetnumber'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model, 'street', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'street'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'streetdetails'); ?>
		<?php echo $form->textField($model, 'streetdetails', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'streetdetails'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'city'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model, 'state', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'state'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'zipcode'); ?>
		<?php echo $form->textField($model, 'zipcode', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'zipcode'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_countries'); ?>
		<?php echo $form->dropDownList($model, 'id_countries', GxHtml::listDataEx(Countries::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_countries'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'birthdate'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'birthdate',
			'value' => $model->birthdate,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'birthdate'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'agreerules'); ?>
		<?php echo $form->checkBox($model, 'agreerules'); ?>
		<?php echo $form->error($model,'agreerules'); ?>
		</div><!-- row -->
		<div class="row">
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
		<div class="row">
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