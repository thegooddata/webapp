<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change password");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Change password"),
);
?>

<section id="tgd-page-content">
    <div class="container">
        <div class="row">
            <section id="form" class="col-sm-16">

							<h1><?php echo UserModule::t("Change password"); ?></h1>

							<?php if ($success != "") { ?> 
							<div class="clearfix">
							    <div class="col-sm-7 alert alert-success"><?php echo $success; ?></div>
							</div>  
							<?php } ?>

							<?php if ($error != "") { ?>   
							<div class="clearfix">
							    <div class="col-sm-7  alert alert-danger"><?php echo $error; ?>
							    <?php echo CHtml::errorSummary($form); ?>
							    </div>
							</div>
							<?php } ?>

							<?php echo CHtml::beginForm(); ?>

								<div class="form-group clearfix">
	                <div class="col-sm-7 nopadding">
	                    <?php echo CHtml::activeLabelEx($form,'password'); ?>
											<?php echo CHtml::activePasswordField($form,'password',array('placeholder'=>'password', 'class'=>'form-control')); ?>
                  </div>
                </div>


								<div class="form-group clearfix">
	                <div class="col-sm-7 nopadding">
										<?php echo CHtml::activeLabelEx($form,'verifyPassword'); ?>
										<?php echo CHtml::activePasswordField($form,'verifyPassword',array('placeholder'=>'verify password', 'class'=>'form-control')); ?>
                  </div>
                </div>
								
								
								<div class="form-group clearfix">
								<?php echo CHtml::submitButton(UserModule::t("Save"), array('class'=>'btn btn-primary col-sm-2 col-sm-offset-1')); ?>
								</div>

							<?php echo CHtml::endForm(); ?>
				
            </section>
        </div>
    </div>    
</section>			