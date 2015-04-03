<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'browsing-flagged-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'member_id'); ?>
            <?php echo $form->dropDownList($model, 'member_id', CHtml::listData(Members::model()->findAll(), 'id', 'username'),array('empty' => array(0 => 'For All')));?>
            <?php echo $form->error($model,'member_id'); ?>
        </div><!-- row -->
		<div class="row">
            <?php echo $form->labelEx($model,'domain'); ?>
            <?php echo $form->textField($model, 'domain', array('maxlength' => 255)); ?>
            <?php echo $form->error($model,'domain'); ?>
		</div><!-- row -->
		<div class="row">
            <?php echo $form->labelEx($model,'url'); ?>
            <?php echo $form->textArea($model, 'url'); ?>
            <?php echo $form->error($model,'url'); ?>
		</div><!-- row -->



<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->