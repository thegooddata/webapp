<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		// array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
		array('label'=>Yii::t('app', 'Manage') . ' ' . 'Queries Blacklist', 'url' => array('queriesBlacklist/admin')),
		array('label'=>Yii::t('app', 'Manage') . ' ' . 'Queries Flagged', 'url' => array('queriesFlagged/admin')),
	);


Yii::app()->clientScript->registerCoreScript('bbq');

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('queries-grid', {
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

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?> <!--|--> 
<?php //echo GxHtml::link(Yii::t('app', 'Export'), array('excel')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'queries-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'member_id',
		'user_id',
		'provider',
		// array(            // display 'author.username' using an expression
		// 	'header' => 'share',
  //           'name'=>'share',
  //           'type' => 'raw',
  //           'value'=>'CHtml::link(CHtml::encode($data->share))',
  //       ),
        array(
            'name'=>'share',
            'type'=>'html',
            'value'=>'($data->share=="true")?CHtml::image("http://static.freepik.com/foto-gratis/ok-icono_17-1009133509.jpg","",array("style"=>"width:20px;height:20px;")):CHtml::image("http://2.bp.blogspot.com/_NU3sjv3wbj8/TN9tsnciSQI/AAAAAAAACuQ/r0J9Q2VbyXA/s320/psicologo.png","",array("style"=>"width:20px;height:20px;"))'
 
        ),
		'data',
		'query',
		/*
		'lang',
		'usertime',
		'language_support',
		'created_at',
		'updated_at',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>