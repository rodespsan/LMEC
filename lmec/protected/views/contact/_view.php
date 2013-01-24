<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cell_phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->cell_phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone_number_house')); ?>:</b>
	<?php echo CHtml::encode($data->telephone_number_house); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone_number_office')); ?>:</b>
	<?php echo CHtml::encode($data->telephone_number_office); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('extension_office')); ?>:</b>
	<?php echo CHtml::encode($data->extension_office); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>