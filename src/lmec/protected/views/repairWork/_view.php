<?php
/* @var $this RepairWorkController */
/* @var $data RepairWork */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_id')); ?>:</b>
	<?php echo CHtml::encode($data->work_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repair_id')); ?>:</b>
	<?php echo CHtml::encode($data->repair_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_hour')); ?>:</b>
	<?php echo CHtml::encode($data->date_hour); ?>
	<br />


</div>