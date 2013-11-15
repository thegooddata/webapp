<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('member_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->member)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('domain')); ?>:
	<?php echo GxHtml::encode($data->domain); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('adtracks_sources_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->adtracksSources)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />

</div>