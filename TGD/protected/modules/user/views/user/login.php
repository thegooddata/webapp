<?php
//$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Sign in to TheGoodData"),
);
?>
<section id="tgd-page-content">
    <div class="container">
        <div class="row">
            <section id="form" class="col-sm-16">
                <h1><?php echo UserModule::t("Sign in to TheGoodData"); ?></h1><!-- TODO: translate -->


                <?php if(Yii::app()->user->hasFlash('loginMessage')) { ?> 
                <div class="clearfix">
                    <div class="col-sm-7 cl-sm-offset-1 alert alert-success"><?php echo Yii::app()->user->getFlash('loginMessage'); ?></div>
                </div>  
                <?php } ?>

                <?php if (CHtml::errorSummary($model) != "") { ?>   
                <div class="clearfix">
                    <div class="col-sm-7 alert alert-danger">
                    <?php echo CHtml::errorSummary($model); ?>
                    </div>
                </div>
                <?php } ?>

                <!-- <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p> -->
                <?php echo CHtml::beginForm(); ?>

                <div class="form-group clearfix">
                    <div class="col-sm-7 nopadding">
                        <label for="UserLogin_username" class="required">username or email</label>
                        <?php echo CHtml::activeTextField($model,'username',array('placeholder'=>'username', 'class'=>'form-control')) ?>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="col-sm-7 nopadding">
                        <label for="UserLogin_password" class="required">password</label>
                        <?php echo CHtml::activePasswordField($model,'password',array('placeholder'=>'password', 'class'=>'form-control')) ?>
                    </div>
                </div>

                <div class="form-group clearfix">
                    <?php echo CHtml::submitButton(UserModule::t("Sign in")/*TODO: <- translate this*/, array('class'=>'btn btn-primary col-sm-2')); ?>
                    <p class="hint col-sm-5" id="rememberMe">
                    <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
                    <?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
                     | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
                    </p>
                </div>
                
                 <div class="form-group">
                    <p class="col-sm-7" id="becomeAMember"><?php echo UserModule::t("Do you want to collaborate with us? "). CHtml::link(UserModule::t("Become a member"),Yii::app()->getModule('user')->registrationUrl, array('class'=>'modal-trigger') ); ?></p>
                </div> 

            <?php echo CHtml::endForm(); ?>

            </section>
        </div>
    </div>    
</section>

<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Sign in',
        ),
    ),
), $model);
?>