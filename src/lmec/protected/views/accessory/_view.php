<?php
/* @var $this AccessoryController */
/* @var $data Accessory */
?>

<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view','id'=>$data->id)); ?>
	<br />
    
</div>
