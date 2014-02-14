<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'loan_identifier'); ?>
		<?php echo $form->textField($model, 'loan_identifier', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'leader'); ?>
		<?php echo $form->dropDownList($model, 'leader', GxHtml::listDataEx(LoansLeaders::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'loan_url'); ?>
		<?php echo $form->textField($model, 'loan_url', array('maxlength' => 255)); ?>
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
		<?php echo $form->label($model, 'currency'); ?>
		<?php echo $form->dropDownList($model, 'currency', GxHtml::listDataEx(Currencies::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
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
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'loan_date',
			'value' => $model->loan_date,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'loan_update'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'loan_update',
			'value' => $model->loan_update,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'paidback'); ?>
		<?php echo $form->textField($model, 'paidback'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'loss'); ?>
		<?php echo $form->textField($model, 'loss'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_loans_status'); ?>
		<?php echo $form->dropDownList($model, 'id_loans_status', GxHtml::listDataEx(LoansStatus::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'image'); ?>
		<?php echo $form->textField($model, 'image', array('maxlength' => 255)); ?>
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

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
