<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
<?php echo $form->errorSummary($model2); ?>



		
	<div class="row">
		<?//php  echo var_dump($model);  ?>
		<?php echo $form->labelEx($model2,'observation'); ?>
		<?php echo $form->textArea($model2,'observation',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model2,'observation'); ?>
	

	</div>


<div class="row buttons">
		<?php echo CHtml::submitButton($model2->isNewRecord ? 'Crear' : 'Editar'); ?>
</div>
	



<?php $this->endWidget(); ?>



















</div><!-- form -->