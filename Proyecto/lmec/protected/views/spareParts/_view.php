<?php
/* @var $this SparePartsController */
/* @var $data SpareParts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('spare_parts_status_id')); ?>:</b>
	<?php echo CHtml::encode($data->sparePartsStatus->description); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->brand->getAttributeLabel('brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->brand->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->provider->getAttributeLabel('provider_id')); ?>:</b>
	<?php echo CHtml::encode($data->provider->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_number')); ?>:</b>
	<?php echo CHtml::encode($data->serial_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />
	
	<b><?php/* echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->getActiveText());*/ ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_hour')); ?>:</b>
	<?php echo CHtml::encode($data->date_hour); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guarantee_period')); ?>:</b>
	<?php echo CHtml::encode($data->guarantee_period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice')); ?>:</b>
	<?php echo CHtml::encode($data->invoice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	

	*/ ?>

</div>