<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('varname')); ?>:
	<?php echo GxHtml::encode($data->varname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('title')); ?>:
	<?php echo GxHtml::encode($data->title); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('field_type')); ?>:
	<?php echo GxHtml::encode($data->field_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('field_size')); ?>:
	<?php echo GxHtml::encode($data->field_size); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('field_size_min')); ?>:
	<?php echo GxHtml::encode($data->field_size_min); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('required')); ?>:
	<?php echo GxHtml::encode($data->required); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('match')); ?>:
	<?php echo GxHtml::encode($data->match); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('range')); ?>:
	<?php echo GxHtml::encode($data->range); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('error_message')); ?>:
	<?php echo GxHtml::encode($data->error_message); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('other_validator')); ?>:
	<?php echo GxHtml::encode($data->other_validator); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('default_value')); ?>:
	<?php echo GxHtml::encode($data->default_value); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('widget')); ?>:
	<?php echo GxHtml::encode($data->widget); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('widgetparams')); ?>:
	<?php echo GxHtml::encode($data->widgetparams); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('position')); ?>:
	<?php echo GxHtml::encode($data->position); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('visible')); ?>:
	<?php echo GxHtml::encode($data->visible); ?>
	<br />
	*/ ?>

</div>