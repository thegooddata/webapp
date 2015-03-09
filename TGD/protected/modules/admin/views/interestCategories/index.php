<?php
$this->breadcrumbs=array(
    'Interest Categories'=>array('index')
);

$this->layout='//layouts/column2';

?>

<h1>Interest Categories</h1>

<?php if(!empty($parent)) : ?>
    <h4><?php echo CHtml::link("Back to parent ($parent->category)", array("/admin/interestCategories?id=" . $parent->parent_id));?></h4>
<?php endif; ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'id',
        array(
            'name' => 'category',
            'value' => function($data, $row) {
                return CHtml::link($data->category, array("/admin/interestCategories?id=" . $data->id));
            },
            'type'=>'raw',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
        ),
    ),
)); ?>
