<!-- modal chrome only install -->
<div id="chromeModal" tabindex="-1" role="dialog" aria-labelledby="chromeModal" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Browser not supported</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-16" id="modal-description">
                        We only support Chrome for the time being. We would appreciate your help to extend our service to other browsers either by collaborating in our 
                        <a href="https://github.com/thegooddata">open source developments</a> or 
                        <a href="<?php echo Yii::app()->controller->createAbsoluteUrl('/donate');?>">giving us a donation.</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form class="form-inline" id="phplist-signup" style="display:none;">
                    <div class="form-group col-sm-10">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="enter your email">
                    </div>
                    <button type="submit" class="btn btn-default col-sm-6 tgd-button tgd-send">Send</button>
                </form>
                <button type="button" class="btn btn-default col-sm-6 tgd-button tgd-send" data-dismiss="modal" style="display: none;">Close</button>
                <a type="button" class="btn btn-default tgd-button tgd-send" href="<?php echo Yii::app()->controller->createAbsoluteUrl("/donate");?>">Continue</a>
            </div>
        </div>
    </div>
</div>

<!-- modal chrome install success -->
<div id="chromeModalInstallSuccess" tabindex="-1" role="dialog" aria-labelledby="chromeModalInstallSuccess" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Congratulations!</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-16">
                        TheGoodData extension has been correctly installed on your browser. Enjoy!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal chrome install fail -->
<div id="chromeModalInstallFail" tabindex="-1" role="dialog" aria-labelledby="chromeModalInstallFail" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-16">
                        TheGoodData extension could not be installed. Please try again.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>