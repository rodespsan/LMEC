<?php
/* @var $this ActivityGuaranteeController */
/* @var $data ActivityGuarantee */
?>

<div class="view">

	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>-->
	<?php // echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<!--<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->description), array('view', 'id'=>$data->id)); ?>
	<br />

<!--	<b><?php // echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php // echo CHtml::encode($data->active); ?>
	<br />-->


</div>