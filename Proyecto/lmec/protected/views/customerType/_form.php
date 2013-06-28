<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos</p>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::encode($model->getAttributeLabel('active')); ?>
        <?php echo $form->checkbox($model,'active');?>
        <?php echo $form->error($model,'active'); ?>
    </div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->