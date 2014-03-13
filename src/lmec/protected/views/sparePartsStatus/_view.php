<?php
/* @var $this SparePartsStatusController */
/* @var $data SparePartsStatus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->description), array('view', 'id'=>$data->id)); ?>
	<br />

	


</div>