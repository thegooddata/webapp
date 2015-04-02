<?php
$this->breadcrumbs=array(
    'Manage Web Trackers'=>array('index')
);

$this->menu=array(

    array('label'=>'Compare Web Trackers', 'url'=>array('/admin/webtrackers/compare')),
);

$this->layout='//layouts/column2';

?>
<h1>Manage Web Trackers</h1>

<?php echo CHtml::link('Compare Web Trackers', array("/admin/webtrackers/compare"), array('class' => 'btn btn-success'));?>
