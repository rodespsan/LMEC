<?php
/* @var $this PaymentTypeController */
/* @var $data PaymentType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('advance_payment')); ?>:</b>
	<?php echo CHtml::encode($data->advance_payment); ?>
	<br />

</div>