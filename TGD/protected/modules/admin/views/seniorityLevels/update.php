<?php
$this->breadcrumbs=array(
    'Seniority Levels'=>array('index')
);

$this->layout='//layouts/column2';

$this->menu=array(
    array('label'=>'Create Seniority Levels', 'url'=>array('seniorityLevels/create')),
);
?>

    <h1><?php echo 'Update Seniority Level'; ?></h1>

<?php
echo $this->renderPartial('_form', array('model'=>$model));
?>