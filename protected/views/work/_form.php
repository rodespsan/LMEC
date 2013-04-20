<?php
/* @var $this WorkController */
/* @var $model Work */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'work-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'service_type_id'); ?>
		<?php echo $form->radioButtonList($model,'service_type_id',CHtml::listData(ServiceType::model()->findAll('active = 1'),'id','name'),
		array('separator' => '  ','labelOptions'=>array('style'=>'display:inline')));?>
		<?php //echo $form->radioButtonList($model,'service_type_id',CHtml::listData(Brand::model()->findAll('active = 1'),'id','name'), array('empty'=>'Seleccionar Marca'));?>
		<?php echo $form->error($model,'service_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php $htmlParams = array('value'=> 1, 'uncheckValue'=>0); ?>
		<!--Si es un nuevo registro mantener el activo seleccionado-->
		<?php if($model->isNewRecord) $htmlParams += array('checked'=>'checked'); ?>
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkbox($model,'active', $htmlParams); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->