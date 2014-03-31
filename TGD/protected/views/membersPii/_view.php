<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('firstname')); ?>:
	<?php echo GxHtml::encode($data->firstname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lastname')); ?>:
	<?php echo GxHtml::encode($data->lastname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('streetname')); ?>:
	<?php echo GxHtml::encode($data->streetname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('streetnumber')); ?>:
	<?php echo GxHtml::encode($data->streetnumber); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('streetdetails')); ?>:
	<?php echo GxHtml::encode($data->streetdetails); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('city')); ?>:
	<?php echo GxHtml::encode($data->city); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('statecounty')); ?>:
	<?php echo GxHtml::encode($data->statecounty); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('country')); ?>:
	<?php echo GxHtml::encode($data->country); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('postcode')); ?>:
	<?php echo GxHtml::encode($data->postcode); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('daybirthday')); ?>:
	<?php echo GxHtml::encode($data->daybirthday); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('monthbirthday')); ?>:
	<?php echo GxHtml::encode($data->monthbirthday); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('yearbirthday')); ?>:
	<?php echo GxHtml::encode($data->yearbirthday); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('agree')); ?>:
	<?php echo GxHtml::encode($data->agree); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('member_id')); ?>:
	<?php echo GxHtml::encode($data->member_id); ?>
	<br />
	*/ ?>

</div>