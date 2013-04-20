<?php
/* @var $this AccesoryController */
/* @var $model Accesory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'accesory-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'name'),
)); 
?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
		
    <div class="row">
    <?php //echo CHtml::encode($model->getAttributeLabel('active')); ?>
	<?php $htmlParams = array('value'=> 1, 'uncheckValue'=> 0 ); ?>
	<?php if($model->isNewRecord) $htmlParams += array('checked'=>'checked'); ?>
	<?php echo $form->checkbox($model,'active',$htmlParams). '	Activo'; ?>
    <?php echo $form->error($model,'active'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->