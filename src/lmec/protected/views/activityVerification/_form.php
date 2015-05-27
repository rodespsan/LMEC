<?php
/* @var $this ActivityVerificationController */
/* @var $model ActivityVerification */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activity-verification-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
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
		<?php echo $form->labelEx($model,'service_type_id'); ?>
		<?php echo $form->dropDownList($model,'service_type_id',
			CHtml::listData(
                 ServiceType::model()->findAll(array(
					'condition' => 'active = 1',
					'order' => 'name'
				)),
				'id',
				'name'
			), 
                        array('prompt'=>'Seleccionar'))
//			array('size'=>10,'maxlength'=>10)); 
                                ?>
		<?php echo $form->error($model,'service_type_id'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'equipment_type_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'equipment_type_id',
			CHtml::listData(
				EquipmentType::model()->findAll(array(
					'condition' => 'active=1'
				)),
				'id',
				'type'
			),
			array(
				'prompt' => 'Seleccionar',
                               
			)
		); ?>
		<?php echo $form->error($model,'service_type_id'); ?>
	</div>

        
	<div class="row">
		<?php echo $form->labelEx($model,'activity'); ?>
		<?php echo $form->textField($model,'activity',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkBox($model,'active', array('value' => 1, 'uncheckValue' => 0)); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->