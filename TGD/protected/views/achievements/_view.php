<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('achievement_type_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->achievementType)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('link_en_us')); ?>:
	<?php echo GxHtml::encode($data->link_en_us); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('link_es')); ?>:
	<?php echo GxHtml::encode($data->link_es); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('text_en_us')); ?>:
	<?php echo GxHtml::encode($data->text_en_us); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('text_es')); ?>:
	<?php echo GxHtml::encode($data->text_es); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('achievements_start')); ?>:
	<?php echo GxHtml::encode($data->achievements_start); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('achievements_finish')); ?>:
	<?php echo GxHtml::encode($data->achievements_finish); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	*/ ?>

</div>