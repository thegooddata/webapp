<?php

$this->breadcrumbs = array(
	LoansActivities::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . LoansActivities::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . LoansActivities::label(2), 'url' => array('admin')),

	array('label'=>'Manage Loan', 'url'=>array('/loans/admin')),
	array('label'=>'Manage Loan Status', 'url'=>array('/loansStatus/admin')),
);
?>

<h1><?php echo GxHtml::encode(LoansActivities::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 