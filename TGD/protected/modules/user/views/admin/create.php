<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Create'),
);

if (!UserModule::isAdmin())
	$this->menu_admin=array();

$this->menu=array(
    array('label'=>UserModule::t('Manage Membes'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('List Member'), 'url'=>array('/user')),
);
?>
<h1><?php echo UserModule::t("Create Member"); ?></h1>

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>