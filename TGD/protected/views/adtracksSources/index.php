<?php

$this->breadcrumbs = array(
	AdtracksSources::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . AdtracksSources::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . AdtracksSources::label(2), 'url' => array('admin')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . 'Webtrack Types', 'url' => array('adtracksTypes/admin')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . 'Webtrack Whitelist', 'url' => array('whitelists/admin')),
);
?>

<h1><?php echo GxHtml::encode(AdtracksSources::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 