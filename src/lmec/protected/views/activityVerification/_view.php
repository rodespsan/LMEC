<?php
/* @var $this ActivityVerificationController */
/* @var $data ActivityVerification */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('activity')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->activity), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->serviceType->name); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('equipment_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->equipmentType->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>