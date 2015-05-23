<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'superuser'); ?>
		<?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus')); ?>
		<?php echo $form->error($model,'superuser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'seniority_level'); ?>
        <?php echo $form->dropDownList($model, 'seniority_level', CHtml::listData(SeniorityLevels::model()->findAll('type=3'), 'id', 'level'),array('empty' => 'Automatically Calculated'));?>
        <?php echo $form->error($model,'seniority_level'); ?>
    </div><!-- row -->

    <div class="form-group">
        <label>Avatar</label>
        <div class="row">
            <div>
                <label for="User_image" class="btn btn-success upload-avatar">Upload Avatar</label>
            </div>
            <br/>
            <div>
                <?php echo CHtml::activeFileField($model, 'image'); ?>
                <?php if (!empty($model->avatar)) : ?>
                    <img class="thumbnail" id="profile_image" src="<?php echo Yii::app()->baseUrl; ?>/uploads/avatars/<?php echo $model->id ?>/thumb/<?php echo $model->avatar ?>" />
                <?php else : ?>
                    <img class="thumbnail hide" id="profile_image" src="#" />
                <?php endif; ?>

                <div class="thumbnail profile_preview_block" style="display: none">
                    <div>
                        <img id="profile_image_preview" src="#" />
                    </div>
                </div>

                <input id="admin_user_id" type="hidden" name="id" value="<?php echo $model->id?>">

                <div id="profile_crop_image" style="display: none">
                    <img class="thumbnail" id="profile_crop" src="#" />
                    <div class="pull-left profile_crop_buttons">
                        <label class="btn btn-primary profile_crop_avatar" style="display: none">Apply Crop</label>
                        <label class="btn btn-primary profile_crop_cancel" style="display: none">Cancel</label>
                    </div>
                    <input type="hidden" id="x" name="crop_x" />
                    <input type="hidden" id="y" name="crop_y" />
                    <input type="hidden" id="w" name="crop_w" />
                    <input type="hidden" id="h" name="crop_h" />
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Url</label>
        <input type="text" id="url" name="User[url]" value="<?php echo $model->url; ?>">
    </div>

    <div class="form-group">
        <label>Notification Preferences</label>
        <div class="checkbox notification_preferences">
            <label id="notification_preferences_label">
                <input type="checkbox" id="notification_preferences" name="User[notification_preferences]" value="1" <?php if($model->notification_preferences) echo 'checked'; ?>>
                <span><?php echo ($model->notification_preferences) ? 'Subscribed' : 'Unsubscribed'; ?></span>
            </label>
        </div>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'key'); ?>
		<?php echo $form->textArea($model, 'key'); ?>
		<?php echo $form->error($model,'key'); ?>
	</div><!-- row -->

<?php 
		$profileFields=Profile::getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>
			<?php
			}
		}
?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/themes/tgd/css/vendor/jquery.Jcrop.css');?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/themes/tgd/js/vendor/jquery.Jcrop.js', CClientScript::POS_END);?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/themes/tgd/js/profile-crop.js', CClientScript::POS_END);?>
<script>
    $(function() {
        $('#notification_preferences').change(function(){
            if(this.checked){
                $('#notification_preferences_label span').text('Subscribed')
            }else{
                $('#notification_preferences_label span').text('Unsubscribed')
            }
        })
    });
</script>
