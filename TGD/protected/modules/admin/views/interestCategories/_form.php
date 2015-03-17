<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'interest-categories-form',
	'enableAjaxValidation'=>true,
));
?>
    	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category', array('disabled' => true)); ?>
		<?php echo $form->error($model,'category'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array(0 => 'Disabled', 1 => 'Enabled'));?>
        <?php echo $form->error($model,'status'); ?>
    </div><!-- row -->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->