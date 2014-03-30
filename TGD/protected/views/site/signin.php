<form action="<?php echo Yii::app()->controller->createUrl("/user/login");?>" method="POST">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Sign in</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-sm-16">
                <label>Username</label>
                <input id="UserLogin_username" type="text" name="UserLogin[username]" placeholder="username" class="form-control">            
            </div>
            <div class="form-group col-sm-16">
                <label>Password</label>
                <input id="UserLogin_password" type="password" name="UserLogin[password]" placeholder="password" class="form-control">
            </div>
            <div class="form-group checkbox col-sm-16 col-md-16 co-lg-16">
                <input id="ytUserLogin_rememberMe" type="hidden" name="UserLogin[rememberMe]" value="0">
                <label for="UserLogin_rememberMe">
                    <input type="checkbox" id="UserLogin_rememberMe" name="UserLogin[rememberMe]" value="1"> remember me                                        
                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a type="button" class="btn btn-default tgd-button tgd-register"  href="<?php echo Yii::app()->controller->createUrl('/user/registration');?>">Register</a>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="submit" name="yt0" class="btn btn-primary tgd-button tgd-send">Sign in</button>
    </div>
</form>