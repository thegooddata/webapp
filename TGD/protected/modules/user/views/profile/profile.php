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
                                    <img class="thumbnail" id="profile_image" src="<?php echo Yii::app()->baseUrl; ?>/uploads/avatars/<?php echo $user->id ?>/thumb/<?php echo $user->avatar ?>" style="height: 100px;" />
                                <?php else : ?>
                                    <img class="thumbnail hide" id="profile_image" src="#" style="height: 100px;" />
                                <?php endif; ?>
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
                        <div class="checkbox">
                            <label id="notification_preferences_label">
                                <input type="checkbox" id="notification_preferences" name="ProfileForm[notification_preferences]" value="1" <?php if($user->notification_preferences) echo 'checked'; ?>>
                                <span><?php echo ($user->notification_preferences) ? 'Subscribed' : 'Unsubscribed'; ?></span>
                            </label>
                        </div>
                        <span class="glyphicon glyphicon-question-sign form-control-feedback" data-toggle="popover" data-placement="top" data-content='Subscribe or unsubscribe from both company newsletters and Collaboration network updates.'></span>
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
    // this script for collecting the form data and pass to the controller action and doing the on success validations
    $(document).ready(function(){
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
    })

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_image').attr('src', e.target.result).removeClass('hide');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
