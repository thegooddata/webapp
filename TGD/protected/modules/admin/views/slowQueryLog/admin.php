<?php
/* @var $this SlowQueryLogController */
/* @var $model SlowQueryLog */

$this->breadcrumbs=array(
	'Slow Query Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SlowQueryLog', 'url'=>array('index')),
	array('label'=>'Create SlowQueryLog', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#slow-query-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Slow Query Logs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?> <br />
<?php echo CHtml::link('Truncate table (clear logs)', array('truncate'), array(
    'onclick'=>"return confirm('Are you sure you want to clear slow query logs?');"
)); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'slow-query-log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'query',
		'count',
		'total_s',
//		'avg_s',
//		'min_s',
//		'max_s',
		'created_at',
//		'updated_at',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}',
		),
	),
)); ?>
