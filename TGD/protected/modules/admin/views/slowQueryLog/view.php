<?php
/* @var $this SlowQueryLogController */
/* @var $model SlowQueryLog */

$this->breadcrumbs=array(
	'Slow Query Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Manage SlowQueryLog', 'url'=>array('admin')),
);
?>

<h1>View SlowQueryLog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'query',
		'count',
		'total_s',
		'avg_s',
		'min_s',
		'max_s',
		'created_at',
		'updated_at',
	),
)); ?>
