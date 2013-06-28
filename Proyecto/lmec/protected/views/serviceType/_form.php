<?php
/* @var $this ServiceTypeController */
/* @var $model ServiceType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-type-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php $htmlParams = array('value'=> 1, 'uncheckValue'=>0); ?>
		<?php if($model->isNewRecord) $htmlParams += array('checked'=>'checked'); ?>
		<?php echo $form->checkbox($model,'active', $htmlParams). ' Activo'; ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->