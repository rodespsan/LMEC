<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary(array($model, $model->contact)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_type_id'); ?>
		<?php echo $form->DropDownList($model,'customer_type_id',CHtml::ListData(CustomerType::model()->findAll(),'id','type')); ?>
		<?php echo $form->error($model,'customer_type_id'); ?>
	</div>
            
        
        
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
		<?php echo $form->labelEx($model->contact,'cell_phone_number'); ?>
		<?php echo $form->textField($model->contact,'cell_phone_number',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model->contact,'cell_phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model->contact,'telephone_number_house'); ?>
		<?php echo $form->textField($model->contact,'telephone_number_house',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model->contact,'telephone_number_house'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model->contact,'telephone_number_office'); ?>
		<?php echo $form->textField($model->contact,'telephone_number_office',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model->contact,'telephone_number_office'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model->contact,'extension_office'); ?>
		<?php echo $form->textField($model->contact,'extension_office',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model->contact,'extension_office'); ?>
	</div>
        
        
        
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dependence_id'); ?>
		<?php
                    $dependencias = array('-1'=>"Seleccionar");                    
                    echo $form->DropDownList($model,'dependence_id',$dependencias+CHtml::ListData(Dependence::model()->findAll(),'id','name')); ?>
		<?php echo $form->error($model,'dependence_id'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->