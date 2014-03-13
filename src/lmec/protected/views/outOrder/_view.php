<?php
/* @var $this OutOrderController */
/* @var $data OutOrder */
?>

<div class="view">

	<?php //echo CHtml::encode($data->getAttributeLabel('id')); ?>
	<?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php //echo CHtml::encode($data->order_id); ?>
	<?php echo CHtml::link(CHtml::encode($data->order->folio), array('view', 'id'=>$data->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->order->customer->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->order->customer->name), array('customer/view', 'id'=>$data->order->customer->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->contact->name), array('contact/view', 'id'=>$data->contact_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user->name); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->order->model->EquipmentType->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->order->model->EquipmentType->type); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->order->model->Brand->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->order->model->Brand->name); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->order->model->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->order->model->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_hour')); ?>:</b>
	<?php echo CHtml::encode($data->date_hour); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_price')); ?>:</b>
	<?php echo CHtml::encode($data->total_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_receive_equipment')); ?>:</b>
	<?php echo CHtml::encode($data->name_receive_equipment); ?>
	<br />


</div>