<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'url_initial') . ' Controlador/acci&oacute;n, '.
		'ambas en ingl&eacute;s. Ejemplo: role/create ' ; ?>
		<?php echo $form->textField($model,'url_initial',array('size'=>100,'maxlength'=>100));?>
		<?php echo $form->error($model,'url_initial'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'priority') ; ?>
		<?php echo $form->textField($model,'priority') . ' (n&uacute;mero mayor, prioridad mayor)'?>
		<?php echo $form->error($model,'priority')?>
	</div>
	
	<div class="row">
	</div>

	<div class="row"> 
		<?php echo CHtml::encode($model->getAttributeLabel('active')); ?>
    	<?php echo $form->checkbox($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->