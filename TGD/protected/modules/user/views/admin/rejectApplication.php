<?php
$this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('admin'),
	$member->username=>array('view','id'=>$member->id),
	(UserModule::t('Reject Application')),
);

if (!UserModule::isAdmin())
	$this->menu_admin=array();

?>

<h1><?php echo  UserModule::t('Reject Application for')." ".$member->username; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'RejectApplicationForm',
	'htmlOptions' => array(
        
    ),
));
?>
	<?php echo $form->errorSummary(array($model)); ?>

	<div class="row">
		<?php echo $form->label($model,'reason', array('style'=>'display:block;')); ?>
		<?php echo $form->radioButtonList($model,'reason', Yii::app()->getModule('user')->rejectReasons, array(
            'onclick'=>'check_selected_reason()'
        )); ?>
		<?php echo $form->error($model,'reason'); ?>
	</div>

    <div class="row" id="other_reason_container" style="<?php if ($model->reason!='other'): ?>display: none;<?php endif; ?>">
		<?php echo $form->label($model,'other_reason', array('style'=>'display:block;')); ?>
		<?php echo $form->textArea($model,'other_reason', array('rows'=>6,'cols'=>40)); ?>
		<?php echo $form->error($model,'other_reason'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Reject'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
function check_selected_reason() {
  var selected=$('#RejectApplicationForm_reason input:checked');
  if (selected) {
    if (selected.val()=='other') {
      $('#other_reason_container').show();
    } else {
      $('#other_reason_container').hide();
    }
  }
}
</script>