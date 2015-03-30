<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Cache',
);

?>

<h1>Cache</h1>

<p>
  <?php echo CHtml::link('Truncate table yiicache', array('truncate'), array(
      'onclick'=>"return confirm('Are you sure you want to clear the application cache table yiicache?');"
  )); ?>
</p>

<p>
  <?php echo CHtml::link('Truncate table cache_data', array('truncate_cache_data'), array(
    'onclick'=>"return confirm('Are you sure you want to clear the application cache table cache_data?');"
)); ?>
</p>
