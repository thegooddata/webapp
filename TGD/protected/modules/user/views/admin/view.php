<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	$model->username,
);

if (!UserModule::isAdmin())
	$this->menu_admin=array();

$this->menu=array(
    //array('label'=>UserModule::t('Create Member'), 'url'=>array('create')),
    array('label'=>UserModule::t('Update Member'), 'url'=>array('update','id'=>$model->id)),
    array('label'=>UserModule::t('Delete Members'), 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
    array('label'=>UserModule::t('Manage Members'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('List Member'), 'url'=>array('/user')),
);

if ($model->status==User::STATUS_APPLIED) {
  $this->menu[]=array('label'=>UserModule::t('Pre-Accept Application'), 'url'=>'#','linkOptions'=>array('submit'=>array('approveApplication','id'=>$model->id),'confirm'=>UserModule::t('Are you sure you want to Pre-Accept this member?')));
  $this->menu[]=array('label'=>UserModule::t('Reject Application'), 'url'=>array('rejectApplication','id'=>$model->id));
}

?>
<h1><?php echo UserModule::t('View Member').' "'.$model->username.'"'; ?></h1>

<?php
 
	$attributes = array(
		'id',
		'username',
	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'type'=>'raw',
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				));
		}
	}
	
	array_push($attributes,
		'password',
		'email',
		'activkey',
		'created_at',
		'lastvisit_at',
		array(
			'name' => 'superuser',
			'value' => User::itemAlias("AdminStatus",$model->superuser),
		),
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		),
		'key'
	);
	
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));

?>
