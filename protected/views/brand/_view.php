<?php
/* @var $this BrandController */
/* @var $data Brand */
?>

<div class="view">
    
	
    <!--se agreg� a la segunda linea link -->
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />
	
	


	


</div>