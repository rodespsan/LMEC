<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(str_pad($data->id, 5, "0", STR_PAD_LEFT)), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->customer->name), array('/','customer'=>$data->customer_id))?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('_brand')); ?>:</b>
	<?php echo CHtml::encode($data->modelo->Brand->name) ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model_id')); ?>:</b>
	<?php echo CHtml::encode($data->modelo->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->serviceType->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_hour')); ?>:</b>
	<?php echo CHtml::encode($data->date_hour); ?>
	<br />

</div>