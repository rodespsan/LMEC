<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('equipment_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->EquipmentType->type); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->Brand->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name),array('view','id'=>$data->id)); ?>
	<br />

</div>