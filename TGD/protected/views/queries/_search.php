<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<!-- INTEGER --><?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'member_id'); ?>
		<!-- INTEGER --><?php echo $form->textField($model, 'member_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<!-- CHARACTER VARYING(255) --><?php echo $form->textField($model, 'user_id', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'provider'); ?>
		<!-- CHARACTER VARYING(128) --><?php echo $form->textField($model, 'provider', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data'); ?>
		<!-- CHARACTER VARYING(256) --><?php echo $form->textField($model, 'data', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'query'); ?>
		<!-- TEXT --><?php echo $form->textArea($model, 'query'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lang'); ?>
		<!-- CHARACTER VARYING(128) --><?php echo $form->textField($model, 'lang', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'share'); ?>
		<!-- CHARACTER VARYING(128) --><?php echo $form->textField($model, 'share', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'usertime'); ?>
		<!-- TIMESTAMP WITH TIME ZONE --><?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
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
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_at'); ?>
		<!-- TIMESTAMP WITH TIME ZONE --><?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
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
	</div>

	<div class="row">
		<?php echo $form->label($model, 'updated_at'); ?>
		<!-- TIMESTAMP WITH TIME ZONE --><?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
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
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
