<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . 'Queries Blacklist', 'url' => array('queriesBlacklist/admin')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . 'Queries Flagged', 'url' => array('queriesFlagged/admin')),
);
?>

<h1><?php echo Yii::t('app', 'Create') . ' ' . GxHtml::encode($model->label()); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>