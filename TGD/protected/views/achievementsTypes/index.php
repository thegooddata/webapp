<?php

$this->breadcrumbs = array(
	AchievementsTypes::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . AchievementsTypes::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . AchievementsTypes::label(2), 'url' => array('admin')),

	array('label'=>'Manage Achievement', 'url'=>array('/achievements/admin')),
);
?>

<h1><?php echo GxHtml::encode(AchievementsTypes::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 