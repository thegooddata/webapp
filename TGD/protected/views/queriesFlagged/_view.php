<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('provider')); ?>:
	<?php echo GxHtml::encode($data->provider); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data')); ?>:
	<?php echo GxHtml::encode($data->data); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('query')); ?>:
	<?php echo GxHtml::encode($data->query); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lang')); ?>:
	<?php echo GxHtml::encode($data->lang); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('share')); ?>:
	<?php echo GxHtml::encode($data->share); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('usertime')); ?>:
	<?php echo GxHtml::encode($data->usertime); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('language_support')); ?>:
	<?php echo GxHtml::encode($data->language_support); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	*/ ?>

</div>