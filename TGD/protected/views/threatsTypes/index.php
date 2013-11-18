<?php

$this->breadcrumbs = array(
	ThreatsTypes::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . ThreatsTypes::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . ThreatsTypes::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(ThreatsTypes::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 