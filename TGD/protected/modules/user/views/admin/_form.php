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
        <?php echo $form->dropDownList($model, 'seniority_level', CHtml::listData(SeniorityLevels::model()->findAll('id=3 OR type=3'), 'id', 'level'),array('empty' => 'Automatically Calculated'));?>
        <?php echo $form->error($model,'seniority_level'); ?>
    </div><!-- row -->

    <div class="form-group">
        <label>Avatar</label>
        <div class="row">
            <div>
                <label for="User_image" class="btn btn-primary">Upload Avatar</label>
            </div>
            <div>
                <?php echo CHtml::activeFileField($model, 'image'); ?>
                <?php if (!empty($model->avatar)) : ?>
                    <img class="thumbnail" id="profile_image" src="<?php echo Yii::app()->baseUrl; ?>/uploads/avatars/<?php echo $model->id ?>/thumb/<?php echo $model->avatar ?>" />
                <?php endif; ?>

                <div class="thumbnail profile_image_block hide">
                    <div>
                        <img id="profile_image_preview" src="#" />
                    </div>
                </div>


                <div id="profile_crop_image" class="hide">
                    <img class="thumbnail" id="profile_preview" src="#" />
                    <div class="pull-left profile_crop_buttons">
                        <label class="btn btn-primary profile_crop_avatar hide">Apply Crop</label>
                        <label class="btn btn-primary profile_crop_cancel hide">Cancel</label>
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

<script src="\themes\tgd\js\vendor\jquery.Jcrop.js"></script>
<link rel="stylesheet" href="\themes\tgd\css\vendor\jquery.Jcrop.css" type="text/css" />
<script>
    var jcrop_api;
    var default_width = 312;

    $(document).ready(function(){

        jcrop_api = $.Jcrop('#profile_preview', {
            onChange: showPreview,
            onSelect: showPreview,
            aspectRatio: 1,
            minSize: 0,
            maxSize: 0
        });

        $('#User_image').addClass('hide');

        $('#User_image').change(function () {
            if(this.value.match(/\.(jpg|jpeg|png|gif)$/)) {
                readURL(this);
            }
        });

        $('#notification_preferences').change(function(){
            if(this.checked){
                $('#notification_preferences_label span').text('Subscribed')
            }else{
                $('#notification_preferences_label span').text('Unsubscribed')
            }
        })

        $(document).on('click', '.profile_crop_avatar', function(){
            $('#profile_crop_image').addClass('hide');
            $('.profile_image_block').removeClass('hide');
        });

    });

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var image  = new Image();
            var file = input.files[0];

            $('#profile_image').addClass('hide');
            $('.profile_image_block').addClass('hide');
            $('#profile_crop_image').addClass('hide');
            $('#profile_preview').attr('src', '#');
//            $('.jcrop-holder').remove();


            reader.onload = function (e) {
                image.src    = e.target.result;
                image.onload = function() {
                    var image_w = this.width;
                    var image_h = this.height;
//                        image_t = file.type,                           // ext only: // file.type.split('/')[1],
//                        image_n = file.name,
//                        image_s = ~~(file.size/1024) +'KB';

                    var image_height = Math.round(image_h * default_width / image_w);
                    var image_width = Math.round(image_w * default_width / image_w);

                    $('#profile_preview').css('width', image_width + 'px');
                    $('#profile_preview').css('height', image_height + 'px');
                    $('#profile_preview').attr('h', image_h);
                    $('#profile_preview').attr('w',image_w);

                    $('#profile_preview').attr('src', e.target.result);
                    $('#profile_image_preview').attr('src', e.target.result);

                    jcrop_api.destroy();
                    jcrop_api = $.Jcrop('#profile_preview', {
                        onChange: showPreview,
                        onSelect: showPreview,
                        setSelect:   [ 0, 0, default_width, image_height ],
                        aspectRatio: 1
                    });
                    $('.jcrop-holder').addClass('thumbnail');
                    $('.jcrop-holder').find('img').attr('src', e.target.result);
                };

            };

            reader.readAsDataURL(file);

            $('#profile_crop_image').removeClass('hide');
        }
    }

    function showPreview(coords)
    {
        var rx = 150 / coords.w;
        var ry = 150 / coords.h;

        var w = parseInt($('#profile_preview').attr('w'))
        var h = parseInt($('#profile_preview').attr('h'))

        var gw = w / default_width;

        $('#profile_image_preview').css({
            width: Math.round(rx * default_width) + 'px',
            height: Math.round(ry * h * default_width / w) + 'px',
            marginLeft: '-' + Math.round(rx * coords.x) + 'px',
            marginTop: '-' + Math.round(ry * coords.y) + 'px'
        });

        $('#x').val(Math.round(coords.x * gw));
        $('#y').val(Math.round(coords.y * gw));
        $('#w').val(Math.round(coords.w * gw));
        $('#h').val(Math.round(coords.h * gw));
        $('.profile_crop_avatar').removeClass('hide');
        $('#profile_image_block').removeClass('hide');
    }

</script>
<style>
    #profile_image{
        width: 150px;
        height: 150px;
    }
    .jcrop-holder{
        margin-top: 30px;
    }
    #User_image{
        display: none;
    }
    .profile_image_block{
        height: 160px;
    }
    .profile_image_block > div{
        width: 150px;
        height: 150px;
        overflow: hidden;
    }
    #notification_preferences_label{
        text-transform: none;
    }
    .notification_preferences{
        margin-top: -5px;
    }
</style>