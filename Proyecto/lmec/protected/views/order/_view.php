<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receptionist_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->receptionist_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->payment_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model_id')); ?>:</b>
	<?php echo CHtml::encode($data->model_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->service_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_hour')); ?>:</b>
	<?php echo CHtml::encode($data->date_hour); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('advance_payment')); ?>:</b>
	<?php echo CHtml::encode($data->advance_payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_number')); ?>:</b>
	<?php echo CHtml::encode($data->serial_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock_number')); ?>:</b>
	<?php echo CHtml::encode($data->stock_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_deliverer_equipment')); ?>:</b>
	<?php echo CHtml::encode($data->name_deliverer_equipment); ?>
	<br />

	*/ ?>

</div>