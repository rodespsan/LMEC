<?php
/* @var $this RepairWorkController */
/* @var $model RepairWork */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'repair-work-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'work_id'); ?>
		<?php echo $form->textField($model,'work_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'work_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repair_id'); ?>
		<?php echo $form->textField($model,'repair_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'repair_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_hour'); ?>
		<?php echo $form->textField($model,'date_hour'); ?>
		<?php echo $form->error($model,'date_hour'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->