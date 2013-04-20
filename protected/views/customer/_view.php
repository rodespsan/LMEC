<div class="view">
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />

	
        <b><?php echo CHtml::encode($data->customerType->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->customerType->type); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('dependence_id')); ?>:</b>
        <?php //echo CHtml::encode($data->dependence_id); 
                if($data->dependence != NULL){
                    echo CHtml::encode($data->dependence->name); 
                }else{
                    echo 'Sin dependencia.';
                }
            //$model = Dependence::model()->findByPk($data->dependence_id);
            //var_dump($model);
            //echo CHtml::encode($model->name);
        ?>
        
	<br />
</div>