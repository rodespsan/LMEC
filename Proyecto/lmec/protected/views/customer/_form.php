<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	
        <h2>Datos del cliente</h2>
        <div class="view">
            <div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
            </div>
            <div class="row">
                
                    <?php echo $form->labelEx($model,'customer_type_id'); ?>
                    <?php echo $form->DropDownList($model,'customer_type_id', CustomerType::getActiveCustomerTypes());                    ?>
                    <?php echo $form->error($model,'customer_type_id'); ?>            
            </div>
            <div class="row">
                    <?php echo $form->labelEx($model,'dependence_id'); ?>
                    <?php echo $form->DropDownList($model,'dependence_id', Dependence::getActiveDependencies()); ?>
                    <?php echo $form->error($model,'dependence_id'); ?>
            </div>
            <div class="row">
                    <?php echo $form->labelEx($model,'address'); ?>
                    <?php echo $form->textArea($model,'address',array('size'=>60,'maxlength'=>200)); ?>
                    <?php echo $form->error($model,'address'); ?>
            </div>
            
            <div class="row">
		<?php echo CHtml::encode($model->getAttributeLabel('active')); ?>
                <?php echo $form->checkbox($model,'active');?>
                <?php echo $form->error($model,'active'); ?>
            </div>
        </div>
        
        <h2>Datos del contacto</h2>
        <div class="view">
            
            <div class="row">
                    <?php echo $form->labelEx($model->contact,'name'); ?>
                    <?php echo $form->textField($model->contact,'name',array('size'=>60,'maxlength'=>100)); ?>
                    <?php echo $form->error($model->contact,'name'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model->contact,'email'); ?>
                    <?php echo $form->textField($model->contact,'email',array('size'=>60,'maxlength'=>100)); ?>
                    <?php echo $form->error($model->contact,'email'); ?>
            </div>
            
            <div class="row">
                <div style="width: 50%; float: right">
                    <?php echo $form->labelEx($model->contact,'extension_office'); ?>
                    <?php echo $form->textField($model->contact,'extension_office',array('size'=>5,'maxlength'=>5)); ?>
                    <?php echo $form->error($model->contact,'extension_office'); ?>
                </div>
                <div style="width: 50%;">
                    <?php echo $form->labelEx($model->contact,'telephone_number_office'); ?>
                    <?php echo $form->textField($model->contact,'telephone_number_office',array('size'=>35,'maxlength'=>35)); ?>
                    <?php echo $form->error($model->contact,'telephone_number_office'); ?>
                </div>
                
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model->contact,'cell_phone_number'); ?>
                    <?php echo $form->textField($model->contact,'cell_phone_number',array('size'=>15,'maxlength'=>15)); ?>
                    <?php echo $form->error($model->contact,'cell_phone_number'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model->contact,'telephone_number_house'); ?>
                    <?php echo $form->textField($model->contact,'telephone_number_house',array('size'=>15,'maxlength'=>15)); ?>
                    <?php echo $form->error($model->contact,'telephone_number_house'); ?>
            </div>            
            
        </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->