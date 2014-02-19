<?php

$this->breadcrumbs = array(
	Loans::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . Loans::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . Loans::label(2), 'url' => array('admin')),

	array('label'=>'Manage Loan Status', 'url'=>array('/loansStatus/admin')),
	array('label'=>'Manage Loan Sector', 'url'=>array('/loansActivities/admin')),
);
?>

<h1><?php echo GxHtml::encode(Loans::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 