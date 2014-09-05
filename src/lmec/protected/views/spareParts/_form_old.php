<?php
/* @var $this SparePartsController */
/* @var $model SpareParts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spare-parts-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'spare_parts_type_id'); ?>
		<?php echo $form->textField($model,'spare_parts_type_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'spare_parts_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spare_parts_status_id'); ?>
		<?php echo $form->textField($model,'spare_parts_status_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'spare_parts_status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->textField($model,'brand_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provider_id'); ?>
		<?php echo $form->textField($model,'provider_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'provider_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serial_number'); ?>
		<?php echo $form->textField($model,'serial_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'serial_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_hour'); ?>
		<?php 
		
		
                $this->widget('zii.widgets.jui.CJuiDatePicker', 
                        array(
                                'model' => $model,
                                'attribute' => 'date_hour',
                                'language' => 'es',
                                'options' => array(
                                        'showAnim' => 'fold',
                                        'dateFormat' => 'yy-mm-dd', 
                                        'defaultDate' => $model->date_hour,
                                        //'defaultDate' => '1990-01-01',
										//'maxDate' => '+10y',
                                        'changeYear' => true,
                                        'changeMonth' => true,
                                        'yearRange' => '1900',
                                ),
                ));
        ?>
		<?php echo $form->error($model,'date_hour'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guarantee_period'); ?>
		<?php echo $form->textField($model,'guarantee_period'); ?>
		<?php echo $form->error($model,'guarantee_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice'); ?>
		<?php echo $form->textField($model,'invoice',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->