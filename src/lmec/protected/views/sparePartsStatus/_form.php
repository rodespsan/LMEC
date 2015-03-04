<?php
/* @var $this SparePartsStatusController */
/* @var $model SparePartsStatus */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spare-parts-status-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
		<?php echo ($model->isNewRecord)? CHtml::submitButton('Agregar +') : ''; ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->