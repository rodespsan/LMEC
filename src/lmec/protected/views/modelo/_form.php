
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modelo-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'equipment_type_id'); ?>
		<?php 
		if($model->isNewRecord == true)
		{
		echo $form->dropDownList($model,'equipment_type_id',
				CHtml::listData(EquipmentType::model()->findAllByAttributes(array('active'=>'1')),'id','type'),array('prompt'=>'Seleccionar',)
			);
		}
		else
		{
		echo $form->dropDownList($model,'equipment_type_id',
				CHtml::listData(EquipmentType::model()->findAll(),'id','type'),array('prompt'=>'Seleccionar',)
			);
		}
		?>
		<?php echo $form->error($model,'equipment_type_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php 
		if($model->isNewRecord == true)
		{
		echo $form->dropDownList($model,'brand_id',
				CHtml::listData(Brand::model()->findAllByAttributes(array('active'=>'1')),'id','name'),array('prompt'=>'Seleccionar',)
			);
		} 
		else
		{
		echo $form->dropDownList($model,'brand_id',
				CHtml::listData(Brand::model()->findAll(),'id','name'),array('prompt'=>'Seleccionar',)
			);
		}
		?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

    <div class="row">
    <?php echo CHtml::encode($model->getAttributeLabel('active')); ?>
    <?php echo $form->checkbox($model,'active');?>
    <?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
		<?php echo ($model->isNewRecord)? CHtml::submitButton('Crear +') : ''; ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
