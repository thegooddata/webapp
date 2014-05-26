<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'firstname'); ?>
		<?php echo $form->textField($model, 'firstname', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lastname'); ?>
		<?php echo $form->textField($model, 'lastname', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'streetname'); ?>
		<?php echo $form->textField($model, 'streetname', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'streetnumber'); ?>
		<?php echo $form->textField($model, 'streetnumber', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'streetdetails'); ?>
		<?php echo $form->textField($model, 'streetdetails', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'statecounty'); ?>
		<?php echo $form->textField($model, 'statecounty', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'country'); ?>
		<?php echo $form->textField($model, 'country', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'postcode'); ?>
		<?php echo $form->textField($model, 'postcode', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'daybirthday'); ?>
		<?php echo $form->textField($model, 'daybirthday', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'monthbirthday'); ?>
		<?php echo $form->textField($model, 'monthbirthday', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'yearbirthday'); ?>
		<?php echo $form->textField($model, 'yearbirthday', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'agree'); ?>
		<?php echo $form->dropDownList($model, 'agree', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_at'); ?>
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
	</div>

	<div class="row">
		<?php echo $form->label($model, 'updated_at'); ?>
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
	</div>

	<div class="row">
		<?php echo $form->label($model, 'member_id'); ?>
		<?php echo $form->textField($model, 'member_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
