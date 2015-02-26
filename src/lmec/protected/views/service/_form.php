<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code'); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'service_type_id'); ?>
		<?php echo $form->dropDownList($model,'service_type_id',CHtml::listData(ServiceType::model()->findAll('active = 1'),'id','name'), array('empty'=>'Seleccionar Tipo de Servicio')); ?>
		<?php echo $form->error($model,'service_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::encode($model->getAttributeLabel('active')); ?>
    	<?php echo $form->checkbox($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear servicio' : 'Actualizar'); ?>
		<?php echo ($model->isNewRecord)? CHtml::submitButton('Crear +') : ''; ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->