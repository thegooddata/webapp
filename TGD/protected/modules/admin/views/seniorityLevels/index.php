<?php
$this->breadcrumbs=array(
    'Seniority Levels'=>array('index')
);

$this->layout='//layouts/column2';

$this->menu=array(
    array('label'=>'Create Seniority Levels', 'url'=>array('seniorityLevels/create')),
);
?>

<h1>Seniority Levels</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'id',
        'level',
        'color',
        array(
            'name' => 'icon',
            'type'=>'raw',
            'value'=> 'CHtml::image(Yii::app()->baseUrl."/uploads/seniority/".$data->icon, $data->icon, array("width"=>50,"height"=>50, "class"=>"thumbnail"))',
        ),
        'percentile',
        array(
            'name' => 'type',
            'value' => '$data->itemAlias("Type",$data->type)',
        ),
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
