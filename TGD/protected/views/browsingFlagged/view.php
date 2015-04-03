<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . 'Browsing', 'url' => array('browsing/admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'label'=>'Member',
            'type'=>'raw',
            'value'=> function($data){
                $member = Members::model()->findByPk($data->member_id);
                return ($member) ? CHtml::link(CHtml::encode($member->username), array('user/admin/view/','id'=>$data->member_id)) : 'For All';
            },
        ),
        'domain',
        'url',
        'usertime',
        'created_at',
        'updated_at',
    ),
)); ?>
