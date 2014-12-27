<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'achievements-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

<!--		<div class="row achievements_id id">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'id'); ?>
		</div>-->
        
		<div class="row achievements_achievement_type_id achievement_type_id">
		<?php echo $form->labelEx($model,'achievement_type_id', array('style'=>'display:block;')); ?>
		<?php echo $form->dropDownList($model, 'achievement_type_id', GxHtml::listDataEx(AchievementsTypes::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'achievement_type_id'); ?>
		</div><!-- row -->
		<div class="row achievements_link_en link_en">
		<?php echo $form->labelEx($model,'link_en', array('style'=>'display:block;')); ?>
		<?php echo $form->textField($model, 'link_en', array('maxlength' => 255,'style'=>'width: 450px;')); ?>
		<?php echo $form->error($model,'link_en'); ?>
		</div><!-- row -->
        
        
<!--		<div class="row achievements_link_es link_es">
		<?php echo $form->labelEx($model,'link_es'); ?>
		<?php echo $form->textField($model, 'link_es', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'link_es'); ?>
		</div>-->
        
        
		<div class="row achievements_text_en text_en">
		<?php echo $form->labelEx($model,'text_en', array('style'=>'display:block;')); ?>
		<?php echo $form->textArea($model, 'text_en', array('style'=>'width: 450px;')); ?>
		<?php echo $form->error($model,'text_en'); ?>
		</div><!-- row -->
        
        
<!--		<div class="row achievements_text_es text_es">
		<?php echo $form->labelEx($model,'text_es'); ?>
		<?php echo $form->textArea($model, 'text_es'); ?>
		<?php echo $form->error($model,'text_es'); ?>
		</div>-->
        
        
		<div class="row achievements_achievements_start achievements_start">
		<?php echo $form->labelEx($model,'achievements_start', array('style'=>'display:block;')); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'achievements_start',
			'value' => $model->achievements_start,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'achievements_start'); ?>
		</div><!-- row -->
		<div class="row achievements_achievements_finish achievements_finish">
		<?php echo $form->labelEx($model,'achievements_finish', array('style'=>'display:block;')); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'achievements_finish',
			'value' => $model->achievements_finish,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'achievements_finish'); ?>
		</div><!-- row -->
		<div class="row achievements_created_at created_at">
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
		<div class="row achievements_updated_at updated_at">
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
        
        
        <div class="row buttons" style="margin-top: 15px;">
          <?php echo GxHtml::submitButton(Yii::t('app', 'Save')); ?>
        </div>


<?php

$this->endWidget();
?>
</div><!-- form -->