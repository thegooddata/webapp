<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Cache',
);

?>

<h1>Cache</h1>

<?php echo CHtml::link('Truncate table (clear cache)', array('truncate'), array(
    'onclick'=>"return confirm('Are you sure you want to clear the application cache table?');"
)); ?>