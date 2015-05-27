<?php
/* @var $this ActivityGuaranteeController */
/* @var $model ActivityGuarantee */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activity-guarantee-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=> 70)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
        <br>
	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkBox($model,'active', array('value' => 1, 'uncheckValue' => 0)); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
		<?php echo ($model->isNewRecord)? CHtml::submitButton('Crear +') : ''; ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->