<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'achievement_type_id'); ?>
		<?php echo $form->dropDownList($model, 'achievement_type_id', GxHtml::listDataEx(AchievementsTypes::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_en_us'); ?>
		<?php echo $form->textField($model, 'title_en_us', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_es'); ?>
		<?php echo $form->textField($model, 'title_es', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'link_en_us'); ?>
		<?php echo $form->textField($model, 'link_en_us', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'link_es'); ?>
		<?php echo $form->textField($model, 'link_es', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'text_en_us'); ?>
		<?php echo $form->textArea($model, 'text_en_us'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'text_es'); ?>
		<?php echo $form->textArea($model, 'text_es'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'achievements_start'); ?>
		<?php echo $form->textField($model, 'achievements_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'achievements_finish'); ?>
		<?php echo $form->textField($model, 'achievements_finish'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'updated_at'); ?>
		<?php echo $form->textField($model, 'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
