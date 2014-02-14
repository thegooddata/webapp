<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('lang')); ?>:
	<?php echo GxHtml::encode($data->lang); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('category')); ?>:
	<?php echo GxHtml::encode($data->category); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('headword')); ?>:
	<?php echo GxHtml::encode($data->headword); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('midword')); ?>:
	<?php echo GxHtml::encode($data->midword); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('action')); ?>:
	<?php echo GxHtml::encode($data->action); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	*/ ?>

</div>