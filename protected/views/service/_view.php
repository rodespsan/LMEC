<?php
/* @var $this ServiceController */
/* @var $data Service */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<?php //echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('service_type_id')); ?>:</b>
	<?php echo Service::getServiceType($data->service_type_id) ?>
	<br />
	
</div>

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
		<?php
		if($data->active == 1)
		{
			echo CHtml::encode('Si'); 
		}else{
			echo CHtml::encode('No'); 
		} ?>
	<br />-->