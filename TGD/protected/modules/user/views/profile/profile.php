<div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <h2>Membership details</h2>
        </div>
    </div>
</div> 

<section id="tgd-page-content">
    <div class="container">
        <div class="row">
            <section id="form" class="col-sm-16 col-md-7 col-md-offset-1">
                <?php  if ($success != ""): ?>   
                    <div class="alert alert-success">
                        <ul>
                            <?php echo $success; ?>
                        </ul>
                    </div>
                <?php  endif; ?>

                <?php if ($error != ""): ?>   
                    <div class="alert alert-danger">
                        <ul>
                            <?php echo $error; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form id="profile-form" action="<?php echo Yii::app()->request->url; ?>" method="POST" enctype="multipart/form-data">
                    <div  class="form-group col-sm-16 col-md-16 col-lg-16">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" name="ProfileForm[username]" value="<?php echo $user->username; ?>">
                    </div>
                    <div class="form-group col-sm-16 col-md-16 col-lg-16 has-info has-feedback">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="ProfileForm[email]" value="<?php echo $user->email; ?>">
                        <span class="glyphicon glyphicon-question-sign form-control-feedback" data-toggle="popover" data-placement="top" data-content="Used for password recovery and infrequent legal communications as a company Member"></span>
                    </div>
                    <div class="form-group col-sm-16 col-md-16 col-lg-16 has-info has-feedback">
                        <label>Avatar</label>
                        <div class="row">
                            <div class="pull-left">
                                <label for="User_image" class="btn btn-success">Upload Avatar</label>
                            </div>
                            <div class="pull-right">
                                <?php echo CHtml::activeFileField($user, 'image'); ?>
                                <?php if (!empty($user->avatar)) : ?>
                                    <img class="thumbnail" id="profile_image" src="<?php echo Yii::app()->baseUrl; ?>/uploads/avatars/<?php echo $user->id ?>/thumb/<?php echo $user->avatar ?>" />
                                <?php else : ?>
                                    <img class="thumbnail hide" id="profile_image" src="#" />
                                <?php endif; ?>

                                <div class="thumbnail profile_image_block pull-right hide">
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
                        <span class="glyphicon glyphicon-exclamation-sign form-control-feedback" data-toggle="popover" data-placement="top" data-content="This image may be visible by others in the about-us page and when participating in the collaboration network. We recommend that you leave it blank or that you use an avatar instead of a picture if you want to preserve your anonymity"></span>
                    </div>
                    <div class="form-group col-sm-16 col-md-16 col-lg-16 has-info has-feedback">
                        <label>Url</label>
                        <input type="text" class="form-control" id="url" name="ProfileForm[url]" value="<?php echo $user->url; ?>">
                        <span class="glyphicon glyphicon-question-sign form-control-feedback" data-toggle="popover" data-placement="top" data-content="If you want, you can provide us with your personal webpage, blog, twitter url, etc)"></span>
                    </div>
                    <div class="form-group col-sm-16 col-md-16 col-lg-16 has-info has-feedback">
                        <label>Notification Preferences</label>
                        <div class="checkbox notification_preferences">
                            <label id="notification_preferences_label">
                                <input type="checkbox" id="notification_preferences" name="ProfileForm[notification_preferences]" value="1" <?php if($user->notification_preferences) echo 'checked'; ?>>
                                <span><?php echo ($user->notification_preferences) ? 'Subscribed' : 'Unsubscribed'; ?></span>
                            </label>
                        </div>
                        <span class="glyphicon glyphicon-question-sign form-control-feedback" data-toggle="popover" data-placement="top" data-content='Subscribe or unsubscribe from company newsletters (not from legal announcements)'></span>
                    </div>

                        <div  class="password-form form-group col-sm-16 col-md-16 col-lg-16">
                            <label>Current password</label>
                            <input type="password" class="form-control" id="current-password" name="ProfileForm[current-password]">
                        </div>
                        <div class="password-form form-group col-sm-16 col-md-16 col-lg-16">
                            <label>New password</label>
                            <input type="password" class="form-control" id="new-password" name="ProfileForm[new-password]">
                        </div>
                        <div class=" password-form form-group col-sm-16 col-md-16 col-lg-16">
                            <label>Confirm new password</label>
                            <input type="password" class="form-control" id="password-confirm" name="ProfileForm[password-confirm]">
                        </div>
                    
                    <div class=" form-group col-sm-16 col-md-16 col-lg-16" id="change-password"><span id="dont">Don't </span>Change password</div>
                    <button type="submit" class="btn btn-primary">Submit changes</button>
                </form>
            </section>
            <section id="description" class="col-sm-16 col-md-7 col-lg-7">
                <p>If you would like to update your membership details (for eg, your postal address), email us 
                at <a href="mailto:members@thegooddata.org">members@thegooddata.org</a> and include your membership 
                number, your full name and proof of the new information (eg, photocopy of new utility bill).</p>
                <p>We have decoupled your personal details from your user data in order to protect your identity. For this reason, your details aren’t shown here.</p>
            </section>
        </div>
        <div id="cancel-account" class="row">
            <div class="col-lg-14 col-md-14 col-md-offset-1 col-lg-offset-1 col-sm-16 btnResign">
                <a href="<?php echo Yii::app()->createAbsoluteUrl('resignation');?>"><img src="<?php echo Yii::app()->theme->baseUrl. "/img/cancel-account.png"; ?>">
                Resign my Membership
                </a>
            </div>
        </div>
    </div>

</section>

<?php
$cs=Yii::app()->clientScript;
$cs->registerPackage('jcrop');
?>

<script>
    $(function() {
        var sameSize = function() {
            var formSectionHeight = $('#form').innerHeight();
            $('#description').innerHeight(formSectionHeight);
        };

        setTimeout(function() {
            sameSize();
        }, 100);

        $('#change-password').click(function() {
            $('.password-form').toggle();
            $('#dont').toggle();
            sameSize();
        });

        $('form').submit(function() {
            // if ($('#password-form:visible').length === 0) {
            //     $('#current-password').val("");
            //     $('#new-password').val("");
            //     $('#confirm-password').val("");
            // }
        });

        $('.form-control-feedback').popover({'trigger': 'hover'});
        // $('.form-control-feedback').on('shown.bs.popover', function() {
        //     var $popover = $(this).parent().find('.popover');

        //     $popover.width(300);
        //     $popover.find('.arrow').css('left', '50%');
        // })
    });
</script>

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
