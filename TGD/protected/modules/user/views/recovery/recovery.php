<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
);
?>
<section id="tgd-page-content">
    <div class="container">
        <div class="row">
            <section id="form" class="col-sm-16">

				<h1><?php echo UserModule::t("Restore"); ?></h1>


				<?php if ($success != "") { ?> 
				<div class="clearfix">
				    <div class="col-sm-7 cl-sm-offset-1 alert alert-success">SUCCESS : <?php echo $success; ?></div>
				</div>  
				<?php } ?>

				<?php if ($error != "") { ?>   
				<div class="clearfix">
				    <div class="col-sm-7 col-sm-offset-1 alert alert-danger"><?php echo $error; ?>
				    <?php echo CHtml::errorSummary($form); ?>
				    </div>
				</div>
				<?php } ?>

				<?php echo CHtml::beginForm(); ?>

					
					<div class="form-group clearfix">
	                    <div class="col-sm-7 col-sm-offset-1">
	                        <label for="UserLogin_username" class="required">username or email</label>
	                        <?php echo CHtml::activeTextField($form,'login_or_email',array('placeholder'=>'username or email', 'class'=>'form-control'));// TODO <- translate this ?>
	                    </div>
	                </div>
					<div class="form-group clearfix">
						<p class="col-sm-7 col-sm-offset-1">We will send you an email with instructions to reset your password.</p>					
					</div>
	                <div class="form-group clearfix">
	                    <?php echo CHtml::submitButton(UserModule::t("Send")/*TODO: <- translate this*/, array('class'=>'btn btn-primary col-sm-2 col-sm-offset-1')); ?>
	                </div>

				<?php echo CHtml::endForm(); ?>
				
            </section>
        </div>
    </div>    
</section>				