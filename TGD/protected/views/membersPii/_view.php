<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('firstname')); ?>:
	<?php echo GxHtml::encode($data->firstname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('surname')); ?>:
	<?php echo GxHtml::encode($data->surname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('streetnumber')); ?>:
	<?php echo GxHtml::encode($data->streetnumber); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('street')); ?>:
	<?php echo GxHtml::encode($data->street); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('streetdetails')); ?>:
	<?php echo GxHtml::encode($data->streetdetails); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('city')); ?>:
	<?php echo GxHtml::encode($data->city); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('state')); ?>:
	<?php echo GxHtml::encode($data->state); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('zipcode')); ?>:
	<?php echo GxHtml::encode($data->zipcode); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_countries')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idCountries)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('birthdate')); ?>:
	<?php echo GxHtml::encode($data->birthdate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('agreerules')); ?>:
	<?php echo GxHtml::encode($data->agreerules); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	*/ ?>

</div>