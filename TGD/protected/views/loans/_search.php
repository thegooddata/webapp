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
		<?php echo $form->label($model, 'leader'); ?>
		<?php echo $form->textField($model, 'leader', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'currency'); ?>
		<?php echo $form->textField($model, 'currency', array('maxlength' => 255)); ?>
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
		<?php echo $form->label($model, 'id_loans_activity'); ?>
		<?php echo $form->dropDownList($model, 'id_loans_activity', GxHtml::listDataEx(LoansActivities::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'image'); ?>
		<?php echo $form->textField($model, 'image', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_countries'); ?>
		<?php echo $form->dropDownList($model, 'id_countries', GxHtml::listDataEx(Countries::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'partner'); ?>
		<?php echo $form->textField($model, 'partner', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'amount'); ?>
		<?php echo $form->textField($model, 'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'term'); ?>
		<?php echo $form->textField($model, 'term'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'contribution'); ?>
		<?php echo $form->textField($model, 'contribution'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'loan_date'); ?>
		<?php echo $form->textField($model, 'loan_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'loan_update'); ?>
		<?php echo $form->textField($model, 'loan_update'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_loans_status'); ?>
		<?php echo $form->dropDownList($model, 'id_loans_status', GxHtml::listDataEx(LoansStatus::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'paidback'); ?>
		<?php echo $form->textField($model, 'paidback'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'loss_currency'); ?>
		<?php echo $form->textField($model, 'loss_currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'loss_defaut'); ?>
		<?php echo $form->textField($model, 'loss_defaut'); ?>
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
