<?php
/* @var $this SeniorityLevelsController */
/* @var $model SeniorityLevels */

$this->breadcrumbs=array(
	'Interest Categories'=>array('index'),
	$model->id,
);

?>

<h1>View Interest Category #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'id',
        array(
            'name' => 'category',
            'value' => CHtml::link($model->category, array("/admin/interestCategories?id=".$model->id)),
            'type' => 'raw'
        ),
        array(
            'name' => 'status',
            'value' => ($model->status) ? 'Enabled' : 'Disabled',
        ),
    )
)); ?>
