<div class="view">

       	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>        
        <br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_name')); ?>:</b>
	<?php echo CHtml::encode($data->contact_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_email')); ?>:</b>
	<?php echo CHtml::encode($data->contact_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_telephone_number')); ?>:</b>
	<?php echo CHtml::encode($data->contact_telephone_number); ?>
	<br />
                
</div>