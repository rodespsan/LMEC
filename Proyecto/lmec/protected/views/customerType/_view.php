<div class="view">
        <?php /*?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
        <?php */?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->type), array('view', 'id'=>$data->id)); ?>
        <?php /*?>
	<?php echo CHtml::encode($data->type); ?><?php */?>
	<br />

	
</div>