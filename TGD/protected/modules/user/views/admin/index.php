<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('/user'),
	UserModule::t('Manage'),
);

if (!UserModule::isAdmin())
	$this->menu_admin=array();

$this->menu=array(
    //array('label'=>UserModule::t('Create Member'), 'url'=>array('create')),
    //array('label'=>UserModule::t('Manage Members'), 'url'=>array('admin')),
    array('label'=>UserModule::t('List Member'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>
<h1><?php echo UserModule::t("Manage Members"); ?></h1>

<?php if(Yii::app()->user->hasFlash('userAdmin')) { ?> 
<div class="clearfix">
    <div class="alert alert-success"><?php echo Yii::app()->user->getFlash('userAdmin'); ?></div>
</div>  
<?php } ?>

<p><?php echo UserModule::t("You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>

<?php echo CHtml::link(UserModule::t('Advanced Search'),'#',array('class'=>'search-button')); ?>  | 
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
        <?php echo CHtml::link('Export!',array('/user/admin/excel'), array('id'=>'export', 'class' => 'btn btn-success')); ?>
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
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
		),
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
		),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
		),
		'created_at',
		'lastvisit_at',
		array(
			'name'=>'superuser',
			'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
			'filter'=>User::itemAlias("AdminStatus"),
		),
		array(
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
			'filter' => User::itemAlias("UserStatus"),
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
