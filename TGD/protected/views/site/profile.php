
<div id="tgd-page-title">
    <div class="container">
        <div class="row">
            <h2>Edit your profile</h2>
        </div>
    </div>
</div> 
<section id="tgd-page-content">
    <div class="container">
        <div class="row">
            <section id="form" class="col-sm-16 col-md-7 col-lg-7 col-md-offset-1 col-lg-offset-1">
                <form action="" method="POST">
                    <div  class="form-group col-sm-16 col-md-16 col-lg-16">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group col-sm-16 col-md-16 col-lg-16 has-info has-feedback">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                        <span class="glyphicon glyphicon-question-sign form-control-feedback" data-toggle="popover" data-placement="top" data-content="Used for password recovery and infrequent legal communications as a company Member"></span>
                        <span class="form-control-help">optional</span>
                    </div>
                    
                        <div  class="password-form form-group col-sm-16 col-md-16 col-lg-16">
                            <label>Current password</label>
                            <input type="text" class="form-control" id="current-password" name="current-password">
                        </div>
                        <div class="password-form form-group col-sm-16 col-md-16 col-lg-16">
                            <label>New password</label>
                            <input type="text" class="form-control" id="new-password" name="new-password">
                        </div>
                        <div class=" password-form form-group col-sm-16 col-md-16 col-lg-16">
                            <label>Confirm new password</label>
                            <input type="password" class="form-control" id="password-confirm" name="password-confirm">
                        </div>
                    
                    <div class=" form-group col-sm-16 col-md-16 col-lg-16" id="change-password"><span id="dont">Don't </span>Change password</div>
                    <button type="submit" class="btn btn-primary">Submit changes</button>
                </form>
            </section>
            <section id="description" class="col-sm-16 col-md-7 col-lg-7">
                <p>In case you want to update your membership details (ie. postal address),
                    please send us an email to <a href="mailto:members@thegooddata.org">members@thegooddata.org</a>
                    including your membership number, full name and a proof of the new data (utility bill).
                </p>
                <p>Your personal details are not displayed here since they have been decoupled from you user data to protect your identity.</p>
            </section>
        </div>
        <div id="cancel-account" class="row">
            <div class="col-lg-14 col-md-14 col-md-offset-1 col-lg-offset-1 col-sm-16"><img src="<?php echo Yii::app()->theme->baseUrl. "/img/cancel-account.png"; ?>">Resign my Membership</div>
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
            if ($('#password-form:visible').length === 0) {
                $('#current-password').val("");
                $('#new-password').val("");
                $('#confirm-password').val("");
            }
        });

        $('.form-control-feedback').popover({'trigger': 'hover'});
        $('.form-control-feedback').on('shown.bs.popover', function() {
            var $popover = $(this).parent().find('.popover');

            $popover.width(300);
            $popover.find('.arrow').css('left', '50%');
        })
    });
</script>
