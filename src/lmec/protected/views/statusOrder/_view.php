<?php
/* @var $this StatusOrderController */
/* @var $data StatusOrder */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->id); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->status), array('view', 'id'=>$data->id)); ?>
	<br />

</div>