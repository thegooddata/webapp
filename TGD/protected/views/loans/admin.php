<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),

		array('label'=>'Manage Loan Status', 'url'=>array('/loansStatus/admin')),
		array('label'=>'Manage Loan Sector', 'url'=>array('/loansActivities/admin')),
		array('label'=>'Manage Charities', 'url'=>array('/loansLeaders/admin')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('loans-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'loans-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'loan_identifier',
		array(
				'name'=>'leader',
				'value'=>'GxHtml::valueEx($data->leader0)',
				'filter'=>GxHtml::listDataEx(LoansLeaders::model()->findAllAttributes(null, true)),
				),
		'loan_url',
		'title_en',
		/*'title_es',
		array(
				'name'=>'id_loans_activity',
				'value'=>'GxHtml::valueEx($data->idLoansActivity)',
				'filter'=>GxHtml::listDataEx(LoansActivities::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'id_countries',
				'value'=>'GxHtml::valueEx($data->idCountries)',
				'filter'=>GxHtml::listDataEx(Countries::model()->findAllAttributes(null, true)),
				),
		'partner',
		'amount',
		array(
				'name'=>'currency',
				'value'=>'GxHtml::valueEx($data->currency0)',
				'filter'=>GxHtml::listDataEx(Currencies::model()->findAllAttributes(null, true)),
				),
		'term',
		'contribution',
		'loan_date',
		'loan_update',
		*/
		'paidback',
		/*
		'loss',
		array(
				'name'=>'id_loans_status',
				'value'=>'GxHtml::valueEx($data->idLoansStatus)',
				'filter'=>GxHtml::listDataEx(LoansStatus::model()->findAllAttributes(null, true)),
				),
		'image',
		'created_at',
		'updated_at',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>