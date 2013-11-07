<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'services-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model, 'category_id', GxHtml::listDataEx(Categories::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'category_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model, 'url', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'url'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('threats')); ?></label>
		<?php echo $form->checkBoxList($model, 'threats', GxHtml::encodeEx(GxHtml::listDataEx(Threats::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->