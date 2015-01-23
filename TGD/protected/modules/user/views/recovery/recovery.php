<?php $this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Reset Your Password"),
);
?>
<section id="tgd-page-content">
    <div class="container">
        <div class="row">
            <section id="form" class="col-sm-16">

							<h1><?php echo UserModule::t("Reset Your Password"); ?></h1>


							<?php if ($success != "") { ?> 
							<div class="clearfix">
							    <div class="col-sm-7 alert alert-success"><?php echo $success; ?></div>
							</div>  
							<?php } ?>

							<?php if ($error != "") { ?>   
							<div class="clearfix">
							    <div class="col-sm-7 alert alert-danger"><?php echo $error; ?>
							    <?php echo CHtml::errorSummary($form); ?>
							    </div>
							</div>
							<?php } ?>

							<?php echo CHtml::beginForm(); ?>

								
								<div class="form-group clearfix">
	                <div class="col-sm-7 nopadding">
	                    <label for="UserLogin_username" class="required">username or email</label>
                        <?php echo CHtml::activeTextField($form,'login_or_email',array('placeholder'=>'username or email', 'class'=>'form-control'));// TODO <- translate this ?>
                  </div>
                </div>

								<div class="form-group clearfix">
									<p class="col-sm-7 nopadding">Enter your email address and we will send you a link to reset your password.</p>					
								</div>
								
                <div class="form-group clearfix">
                    <?php echo CHtml::submitButton(UserModule::t("Send")/*TODO: <- translate this*/, array('class'=>'btn btn-primary col-sm-3')); ?>
                </div>

							<?php echo CHtml::endForm(); ?>
				
            </section>
        </div>
    </div>    
</section>				