<?php
/* @var $this ServiceTypeController */
/* @var $data ServiceType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
		<?php
		if($data->active == 1)
		{
			echo CHtml::encode('Si'); 
		}else{
			echo CHtml::encode('No'); 
		} ?>
	<br />-->
</div>