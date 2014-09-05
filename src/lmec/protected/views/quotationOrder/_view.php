<?php
/* @var $this QuotationOrderController */
/* @var $data QuotationOrder */
?>

<div class="view">

<!--	<b><?php // echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php // echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order->Folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quotation_text')); ?>:</b>
	<?php echo CHtml::decode($data->quotation_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_price')); ?>:</b>
	<?php echo CHtml::encode($data->total_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_hour')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->data_hour), array('view', 'id'=>$data->id)); ?>
	<br />

        

</div>