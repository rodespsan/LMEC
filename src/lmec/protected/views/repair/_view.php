<?php
/* @var $this RepairController */
/* @var $data Repair */
?>

<div class="view">

	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>-->
	<?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<!--<br />-->

        
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order->Folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>