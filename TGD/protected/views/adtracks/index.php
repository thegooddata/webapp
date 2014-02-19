<?php

$this->breadcrumbs = array(
	Adtracks::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	//array('label'=>Yii::t('app', 'Create') . ' ' . Adtracks::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . Adtracks::label(2), 'url' => array('admin')),

	array('label'=>Yii::t('app', 'Manage') . ' ' . 'Webtrack Sources', 'url' => array('adtrackssources/admin')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . 'Webtrack Types', 'url' => array('adtrackstypes/admin')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . 'Webtrack Whitelist', 'url' => array('whitelists/admin')),
);
?>

<h1><?php echo GxHtml::encode(Adtracks::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 