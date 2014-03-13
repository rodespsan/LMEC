<div class="view">
       
	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->type), array('view', 'id'=>$data->id)); ?>
       
	<br />

	
</div>