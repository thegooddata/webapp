<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
<div  class="col-lg-4 col-md-4 col-sm-16">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>

	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Admin operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu_admin,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>

<div class="col-lg-12 col-md-12 col-sm-16">
	<?php echo $content; ?>
</div>
</div>
<?php $this->endContent(); ?>
