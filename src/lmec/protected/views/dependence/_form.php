<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dependence-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>true,
	),
	'focus'=>'input[type="text"]:first',
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>45,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone_number'); ?>
		<?php echo $form->textField($model,'telephone_number',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telephone_number'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'extension'); ?>
		<?php echo $form->textField($model,'extension',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'extension'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkbox($model,'active');?>
		<?php echo $form->error($model,'active'); ?>
        </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
		<?php echo ($model->isNewRecord)? CHtml::submitButton('Crear +') : ''; ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->