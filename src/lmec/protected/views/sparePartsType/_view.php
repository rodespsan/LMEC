<?php
/* @var $this SparePartsTypeController */
/* @var $data SparePartsType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->id); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->type), array('view', 'id'=>$data->id)); ?>
	<br />

</div>