<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

        <div class="row">
                <?php echo $form->labelEx($model,'customer_id')?>
                <?php echo $form->DropDownList($model,'customer_id', Customer::getActiveCustomers()); ?>
                <?php echo $form->error($model,'customer_id'); ?>        
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cell_phone_number'); ?>
		<?php echo $form->textField($model,'cell_phone_number',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'cell_phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone_number_house'); ?>
		<?php echo $form->textField($model,'telephone_number_house',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telephone_number_house'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone_number_office'); ?>
		<?php echo $form->textField($model,'telephone_number_office',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telephone_number_office'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'extension_office'); ?>
		<?php echo $form->textField($model,'extension_office',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'extension_office'); ?>
	</div>
        
        <div class="row">
			<?php echo CHtml::encode($model->getAttributeLabel('active')); ?>
            <?php echo $form->checkbox($model,'active');?>
            <?php echo $form->error($model,'active'); ?>
        </div>
        
        <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->