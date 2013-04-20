<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_id'); ?>
		<?php echo $form->textField($model,'customer_id',array('size'=>50,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receptionist_user_id'); ?>
		<?php echo $form->textField($model, 'receptionist_user_id', array('value'=>$model->getUserLogued()), array('readonly'=>true,'size'=>50,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'receptionist_user_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'date_hour'); ?>
		<?php //echo $form->textField($model,'date_hour'); ?>
		<?php echo $this->renderPartial('application.views.partials.fecha', array('model'=>$model,'name'=>'date_hour'));?>
		<?php echo $form->error($model,'date_hour'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_type_id'); ?>
		<?php echo $form->dropDownList($model,'payment_type_id', CHtml::listData($model->getDependencias(), 'id','name')); ?>
		<?php echo $form->error($model,'payment_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model_id'); ?>
		<?php echo $form->textField($model,'model_id',array('size'=>50,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'model_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_type_id'); ?>
		<?php echo $form->textField($model,'service_type_id',array('size'=>50,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'service_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advance_payment'); ?>
		<?php echo $form->textField($model,'advance_payment',array('size'=>50,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'advance_payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serial_number'); ?>
		<?php echo $form->textField($model,'serial_number',array('size'=>50,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'serial_number'); ?>
	</div>
	
	<div class="row">	
		<?php echo $form->labelEx($model,'_dependences'); ?>
		<?php echo $form->dropDownList($model,'_dependences', CHtml::listData($model->getDependencias(), 'id','name')); ?>
		<?php echo $form->error($model,'_dependences'); ?>
	</div>
	
	<div class="row">	
		<?php echo $form->labelEx($model,'_failureDescription'); ?>
		<?php //echo $form->dropDownList($model,'dependences', CHtml::listData($model->getDependencias(), 'id','name')); ?>
		<?php echo $form->textArea($model, '_failureDescription', array('maxlength' => 300, 'rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model,'_failureDescription'); ?>
	</div>
	
	<div class="row">	
		<?php echo $form->labelEx($model,'_equipmentStatus'); ?>
		<?php //echo $form->dropDownList($model,'dependences', CHtml::listData($model->getDependencias(), 'id','name')); ?>
		<?php echo $form->textArea($model, '_equipmentStatus', array('maxlength' => 300, 'rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model,'_equipmentStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stock_number'); ?>
		<?php echo $form->textField($model,'stock_number',array('size'=>50,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'stock_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_deliverer_equipment'); ?>
		<?php echo $form->textField($model,'name_deliverer_equipment',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_deliverer_equipment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar Entrada' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->