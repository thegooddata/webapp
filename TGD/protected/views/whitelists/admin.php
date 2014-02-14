<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),

		array('label'=>Yii::t('app', 'Manage') . ' ' . 'Webtrack Sources', 'url' => array('adtrackssources/admin')),
		array('label'=>Yii::t('app', 'Manage') . ' ' . 'Webtrack Types', 'url' => array('adtrackstypes/admin')),
		);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('whitelists-grid', {
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
	'id' => 'whitelists-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'user_id',
		array(
				'name'=>'member_id',
				'value'=>'GxHtml::valueEx($data->member)',
				'filter'=>GxHtml::listDataEx(Members::model()->findAllAttributes(null, true)),
				),
		'domain',
		array(
				'name'=>'adtracks_sources_id',
				'value'=>'GxHtml::valueEx($data->adtracksSources)',
				'filter'=>GxHtml::listDataEx(AdtracksSources::model()->findAllAttributes(null, true)),
				),
		array(
					'name' => 'status',
					'value' => '($data->status === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
		/*
		'created_at',
		'updated_at',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>