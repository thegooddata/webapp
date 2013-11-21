<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'loans-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'leader'); ?>
		<?php echo $form->textField($model, 'leader', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'leader'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model, 'currency', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'currency'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'title_en_us'); ?>
		<?php echo $form->textField($model, 'title_en_us', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'title_en_us'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'title_es'); ?>
		<?php echo $form->textField($model, 'title_es', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'title_es'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_loans_activity'); ?>
		<?php echo $form->dropDownList($model, 'id_loans_activity', GxHtml::listDataEx(LoansActivities::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_loans_activity'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model, 'image', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'image'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_loans_countries'); ?>
		<?php echo $form->dropDownList($model, 'id_loans_countries', GxHtml::listDataEx(LoansCountries::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_loans_countries'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'partner'); ?>
		<?php echo $form->textField($model, 'partner', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'partner'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model, 'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'term'); ?>
		<?php echo $form->textField($model, 'term'); ?>
		<?php echo $form->error($model,'term'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'contribution'); ?>
		<?php echo $form->textField($model, 'contribution'); ?>
		<?php echo $form->error($model,'contribution'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'loan_date'); ?>
		<?php echo $form->textField($model, 'loan_date'); ?>
		<?php echo $form->error($model,'loan_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'loan_update'); ?>
		<?php echo $form->textField($model, 'loan_update'); ?>
		<?php echo $form->error($model,'loan_update'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_loans_status'); ?>
		<?php echo $form->dropDownList($model, 'id_loans_status', GxHtml::listDataEx(LoansStatus::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_loans_status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'paidback'); ?>
		<?php echo $form->textField($model, 'paidback'); ?>
		<?php echo $form->error($model,'paidback'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'loss_currency'); ?>
		<?php echo $form->textField($model, 'loss_currency'); ?>
		<?php echo $form->error($model,'loss_currency'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'loss_defaut'); ?>
		<?php echo $form->textField($model, 'loss_defaut'); ?>
		<?php echo $form->error($model,'loss_defaut'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model, 'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->