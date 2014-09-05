<?php
/* @var $this BlogGuaranteeController */
/* @var $data BlogGuarantee */
?>

<div class="view">
<!--
	<b><?php /*echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id));*/ ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order->Folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activity_guarantee_id')); ?>:</b>
	<?php echo CHtml::encode($data->activity_guarantee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('technician_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->technician_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_hour')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->date_hour), array('view', 'id'=>$data->id)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('observation')); ?>:</b>
	<?php echo CHtml::encode($data->observation); ?>
	<br />
        


</div>