<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'members-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model, 'username', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'username'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'activkey'); ?>
		<?php echo $form->textField($model, 'activkey', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'activkey'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lastvisit_at'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'lastvisit_at',
			'value' => $model->lastvisit_at,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'lastvisit_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'superuser'); ?>
		<?php echo $form->textField($model, 'superuser'); ?>
		<?php echo $form->error($model,'superuser'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model, 'status'); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'key'); ?>
		<?php echo $form->textArea($model, 'key'); ?>
		<?php echo $form->error($model,'key'); ?>
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

		<label><?php echo GxHtml::encode($model->getRelationLabel('whitelists')); ?></label>
		<?php echo $form->checkBoxList($model, 'whitelists', GxHtml::encodeEx(GxHtml::listDataEx(Whitelists::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->