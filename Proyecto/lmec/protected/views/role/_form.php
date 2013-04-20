<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>false,
    'focus'=>array($model,'name'),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'url_initial'); ?>
		<?php echo $form->textField($model,'url_initial',array('size'=>100,'maxlength'=>100)) .
		' Cat&aacute;logo/acci&oacute;n, '.
		'ambas en ingl&eacute;s. Ejemplo: role/create '; ?>
		<?php echo $form->error($model,'url_initial'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'priority') ; ?>
		<?php echo $form->textField($model,'priority') . ' (n&uacute;mero mayor, prioridad mayor)'?>
		<?php echo $form->error($model,'priority')?>
	</div>
	
	<div class="row">
	</div>

	<div class="row" id="active" > 
	<?php //echo $form->checkbox($model,'active',array('value'=>1,'uncheckValue'=>0,'checked'=>'checked'));?>
		<?php $htmlParams = array('value'=> 1, 'uncheckValue'=>0); ?>
		<?php if($model->isNewRecord) $htmlParams += array('checked'=>'checked'); ?>
		<?php echo $form->checkbox($model,'active', $htmlParams). '   Activo'; ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->