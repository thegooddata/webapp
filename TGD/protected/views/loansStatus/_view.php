<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name_en')); ?>:
	<?php echo GxHtml::encode($data->name_en); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name_es')); ?>:
	<?php echo GxHtml::encode($data->name_es); ?>
	<br />

</div>