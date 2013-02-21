<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	
        <b><?php echo CHtml::encode($data->customerType->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->customerType->type); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('dependence_id')); ?>:</b>
        <?php //echo CHtml::encode($data->dependence_id); 
                echo CHtml::encode($data->dependence->name); 
            //$model = Dependence::model()->findByPk($data->dependence_id);
            //var_dump($model);
            //echo CHtml::encode($model->name);
        ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />
        <br />
        <h2>Contactos</h2>
        
        <?php foreach ($data->contacts as $contact){?>
        <div class="view">
        <b><?php echo CHtml::encode($contact->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($contact->name); ?>
	<br />

	<b><?php echo CHtml::encode($contact->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($contact->email); ?>
	<br />

	<b><?php echo CHtml::encode($contact->getAttributeLabel('cell_phone_number')); ?>:</b>
	<?php echo CHtml::encode($contact->cell_phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($contact->getAttributeLabel('telephone_number_house')); ?>:</b>
	<?php echo CHtml::encode($contact->telephone_number_house); ?>
	<br />

	<b><?php echo CHtml::encode($contact->getAttributeLabel('telephone_number_office')); ?>:</b>
	<?php echo CHtml::encode($contact->telephone_number_office); ?>
	<br />

	<b><?php echo CHtml::encode($contact->getAttributeLabel('extension_office')); ?>:</b>
	<?php echo CHtml::encode($contact->extension_office); ?>
        </div>
        
	<?php }?>        

</div>