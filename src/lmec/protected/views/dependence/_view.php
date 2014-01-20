<div class="view">
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>        
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone_number')); ?>:</b>
	<?php echo CHtml::encode($data->telephone_number); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('extension')); ?>:</b>
	<?php echo CHtml::encode($data->extension); ?>
	<br />

</div>