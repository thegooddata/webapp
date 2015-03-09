<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seniority-levels-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>
    	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color'); ?>
		<?php echo $form->error($model,'color'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'icon'); ?>
        <?php if (!empty($model->icon))
            echo CHtml::image(Yii::app()->baseUrl."/uploads/seniority/".$model->icon,'alt',array('width'=>100,'height'=>100, 'class'=>'thumbnail'));
        ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->