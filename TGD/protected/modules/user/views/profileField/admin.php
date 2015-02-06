<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Manage'),
);
$this->menu=array(
    array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('create')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Members'), 'url'=>array('/user/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('profile-field-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>
<h1><?php echo UserModule::t('Manage Profile Fields'); ?></h1>

<p><?php echo UserModule::t("You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>

<?php echo CHtml::link(UserModule::t('Advanced Search'),'#',array('class'=>'search-button')); ?>| 
<?php echo GxHtml::link(Yii::t('app', 'Export'), array('#'),array('id'=>'toggle-export')); ?>
<?php $count = count($columns);
	if($count > 0): ?>
	<div class="alert alert-block alert-info fade in"  id="select-fields">
	<h4>Choose fields to export</h4>
	<p>
		<form>
			<div class="row">
				<div class="span8">
				<?php for($i=0; $i < $count; $i++): ?>
					<?php if($i%3 == 0): ?>
						<label><input type="checkbox" name="<?='columns['.$i.']';?>" value="<?=$columns[$i];?>"> <?=$columns[$i];?></label></br>
					<?php endif; ?>
				<?php endfor; ?>
				</div>
				<div class="span8">
				<?php for($i=0; $i < $count; $i++): ?>
					<?php if($i%3 == 1): ?>
						<label><input type="checkbox" name="<?='columns['.$i.']';?>" value="<?=$columns[$i];?>"> <?=$columns[$i];?></label></br>
					<?php endif; ?>
				<?php endfor; ?>
				</div>
				<div class="span8">
				<?php for($i=0; $i < $count; $i++): ?>
					<?php if($i%3 == 2): ?>
						<label><input type="checkbox" name="<?='columns['.$i.']';?>" value="<?=$columns[$i];?>"> <?=$columns[$i];?></label></br>
					<?php endif; ?>
				<?php endfor;?>
				</div>
			</div>
		</form>
	</p>
	<p id="select-fields-buttons" class="clearfix">
        <?php echo CHtml::link('Export!',array('/user/profileField/excel'), array('id'=>'export', 'class' => 'btn btn-success')); ?>
        <a id="select-all" class="btn btn-link" href="#">Select all</a>
        <a id="unselect-all" class="btn btn-link" href="#">Unselect all</a>
    </p>
	</div>
<?php endif;?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'varname',
			'type'=>'raw',
			'value'=>'UHtml::markSearch($data,"varname")',
		),
		array(
			'name'=>'title',
			'value'=>'UserModule::t($data->title)',
		),
		array(
			'name'=>'field_type',
			'value'=>'$data->field_type',
			'filter'=>ProfileField::itemAlias("field_type"),
		),
		'field_size',
		//'field_size_min',
		array(
			'name'=>'required',
			'value'=>'ProfileField::itemAlias("required",$data->required)',
			'filter'=>ProfileField::itemAlias("required"),
		),
		//'match',
		//'range',
		//'error_message',
		//'other_validator',
		//'default',
		'position',
		array(
			'name'=>'visible',
			'value'=>'ProfileField::itemAlias("visible",$data->visible)',
			'filter'=>ProfileField::itemAlias("visible"),
		),
		//*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
