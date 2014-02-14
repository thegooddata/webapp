<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('loan_identifier')); ?>:
	<?php echo GxHtml::encode($data->loan_identifier); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('leader')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->leader0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('loan_url')); ?>:
	<?php echo GxHtml::encode($data->loan_url); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('title_en')); ?>:
	<?php echo GxHtml::encode($data->title_en); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('title_es')); ?>:
	<?php echo GxHtml::encode($data->title_es); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_loans_activity')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idLoansActivity)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('id_countries')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idCountries)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('partner')); ?>:
	<?php echo GxHtml::encode($data->partner); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('amount')); ?>:
	<?php echo GxHtml::encode($data->amount); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('currency')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->currency0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('term')); ?>:
	<?php echo GxHtml::encode($data->term); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('contribution')); ?>:
	<?php echo GxHtml::encode($data->contribution); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('loan_date')); ?>:
	<?php echo GxHtml::encode($data->loan_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('loan_update')); ?>:
	<?php echo GxHtml::encode($data->loan_update); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('paidback')); ?>:
	<?php echo GxHtml::encode($data->paidback); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('loss')); ?>:
	<?php echo GxHtml::encode($data->loss); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_loans_status')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idLoansStatus)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('image')); ?>:
	<?php echo GxHtml::encode($data->image); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	*/ ?>

</div>