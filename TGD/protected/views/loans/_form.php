<div class="form">



<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'loans-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row loans_loan_identifier loan_identifier">
		<?php echo $form->labelEx($model,'loan_identifier'); ?>
		<?php echo $form->textField($model, 'loan_identifier', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'loan_identifier'); ?>
		</div><!-- row -->
		<div class="row loans_leader leader">
		<?php echo $form->labelEx($model,'leader'); ?>
		<?php echo $form->dropDownList($model, 'leader', GxHtml::listDataEx(LoansLeaders::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'leader'); ?>
		</div><!-- row -->
		<div class="row loans_loan_url loan_url">
		<?php echo $form->labelEx($model,'loan_url'); ?>
		<?php echo $form->textField($model, 'loan_url', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'loan_url'); ?>
		</div><!-- row -->
		<div class="row loans_title_en title_en">
		<?php echo $form->labelEx($model,'title_en'); ?>
		<?php echo $form->textField($model, 'title_en', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'title_en'); ?>
		</div><!-- row -->
		<div class="row loans_title_es title_es">
		<?php echo $form->labelEx($model,'title_es'); ?>
		<?php echo $form->textField($model, 'title_es', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'title_es'); ?>
		</div><!-- row -->
		<div class="row loans_id_loans_activity id_loans_activity">
		<?php echo $form->labelEx($model,'id_loans_activity'); ?>
		<?php echo $form->dropDownList($model, 'id_loans_activity', GxHtml::listDataEx(LoansActivities::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_loans_activity'); ?>
		</div><!-- row -->
		
		<div class="row loans_id_countries id_countries">
		<?php echo $form->labelEx($model,'id_countries'); ?>
		<?php echo $form->dropDownList($model, 'id_countries', GxHtml::listDataEx(Countries::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_countries'); ?>
		</div><!-- row -->
		<div class="row loans_partner partner">
		<?php echo $form->labelEx($model,'partner'); ?>
		<?php echo $form->textField($model, 'partner', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'partner'); ?>
		</div><!-- row -->
		<div class="row loans_amount amount">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model, 'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
		</div><!-- row -->
		<div class="row loans_currency currency">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->dropDownList($model, 'currency', GxHtml::listDataEx(Currencies::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'currency'); ?>
		</div><!-- row -->
		<div class="row loans_term term">
		<?php echo $form->labelEx($model,'term'); ?>
		<?php echo $form->textField($model, 'term'); ?>
		<?php echo $form->error($model,'term'); ?>
		</div><!-- row -->
		<div class="row loans_contribution contribution">
		<?php echo $form->labelEx($model,'contribution'); ?>
		<?php echo $form->textField($model, 'contribution'); ?>
		<?php echo $form->error($model,'contribution'); ?>
		</div><!-- row -->
		<div class="row loans_loan_date loan_date">
		<?php echo $form->labelEx($model,'loan_date'); ?>
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
		<?php echo $form->error($model,'loan_date'); ?>
		</div><!-- row -->
		<div class="row loans_loan_update loan_update">
		<?php echo $form->labelEx($model,'loan_update'); ?>
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
		<?php echo $form->error($model,'loan_update'); ?>
		</div><!-- row -->
		<div class="row loans_paidback paidback">
		<?php echo $form->labelEx($model,'paidback'); ?>
		<?php echo $form->textField($model, 'paidback'); ?>
		<?php echo $form->error($model,'paidback'); ?>
		</div><!-- row -->
		<div class="row loans_loss loss">
		<?php echo $form->labelEx($model,'loss'); ?>
		<?php echo $form->textField($model, 'loss'); ?>
		<?php echo $form->error($model,'loss'); ?>
		</div><!-- row -->
		<div class="row loans_id_loans_status id_loans_status">
		<?php echo $form->labelEx($model,'id_loans_status'); ?>
		<?php echo $form->dropDownList($model, 'id_loans_status', GxHtml::listDataEx(LoansStatus::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_loans_status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->FileField($model, 'image', array('style'=>'width:500px; display:inline')); ?> 
		<?php echo $form->error($model,'image'); ?>

		<!-- START UPLOAD FILE -->
		<?php if ($model->image != null) { ?>
		<img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $model->image ?>" />
		<?php } ?>
		<!-- END UPLOAD FILE -->

		</div><!-- row -->
		<div class="row loans_created_at created_at">
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
		<div class="row loans_updated_at updated_at">
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

<style>
.input-file{
	width:200px;
}
</style>