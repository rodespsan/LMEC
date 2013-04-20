<div class="view">
        <?php /*?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
        <?php */?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
        <?php /*?>
	<?php echo CHtml::encode($data->name); ?>
        <?php */?>
	<br />
        <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />
        */ ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone_number')); ?>:</b>
	<?php echo CHtml::encode($data->telephone_number); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('extension')); ?>:</b>
	<?php echo CHtml::encode($data->extension); ?>
	<br />

</div>