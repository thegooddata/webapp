<?php
/* @var $this SeniorityLevelsController */
/* @var $model SeniorityLevels */

$this->breadcrumbs=array(
	'Seniority Levels'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('label'=>'Create Seniority Levels', 'url'=>array('seniorityLevels/create')),
);
?>

<h1>View Seniority Level #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'id',
        'level',
        'color',
        array(
            'name' => 'icon',
            'type'=>'raw',
            'value'=> CHtml::image(Yii::app()->baseUrl."/uploads/seniority/".$model->icon,'alt',array('width'=>100,'height'=>100, 'class'=>'thumbnail')),
        ),
        'percentile',
        array(
            'name' => 'type',
            'value' => $model->itemAlias("Type",$model->type),
        ),
	),
)); ?>
