<?php

$this->breadcrumbs = array(
	History::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . History::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . History::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(History::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 