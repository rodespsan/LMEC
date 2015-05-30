<?php
/* @var $this SparePartsController */
/* @var $model SpareParts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spare-parts-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'spare_parts_type_id'); ?>
		<?php echo $form->dropDownList($model,'spare_parts_type_id',
					CHtml::listData(SparePartsType::model()->findAll('active = 1'),'id','type'),
					array('empty'=>'Seleccionar Tipo')
					); ?>
		<?php echo $form->error($model,'spare_parts_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList($model,'brand_id',CHtml::listData(Brand::model()->findAll('active = 1'),'id','name'), array('empty'=>'Seleccionar Marca')); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spare_parts_status_id'); ?>
		<?php echo $form->dropDownList($model,'spare_parts_status_id',CHtml::listData(SparePartsStatus::model()->findAll('active = 1'),'id','description'),
		array('empty'=>'Seleccionar Estado', 'options'=>array(4=>array('selected'=>'selected')))
		); ?>
		<?php echo $form->error($model,'spare_parts_status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provider_id'); ?>
		<?php echo $form->dropDownList($model,'provider_id',CHtml::listData(Provider::model()->findAll('active = 1'),'id','name'), array('empty'=>'Seleccionar Proveedor')); ?>
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
                                        'onClose' => 'js:function (selectedDate) {
				                            $("#guarantee_period").datepicker("option", "minDate", selectedDate);
				                        }',
                                ),
                ));
        ?>
		<?php echo $form->error($model,'date_hour'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guarantee_period'); ?>
		<?php 
		
		         $this->widget('zii.widgets.jui.CJuiDatePicker', 
                        array(
                                'model' => $model,
                                'attribute' => 'guarantee_period',
                                'language' => 'es',
                                'options' => array(
                                        'showAnim' => 'fold',
                                        'dateFormat' => 'yy-mm-dd', 
                                        'defaultDate' => $model->guarantee_period,
                                        //'defaultDate' => '1990-01-01',
                                        //'minDate' => $model->date_hour,
										'maxDate' => '+10y',
										'changeYear' => true,
                                        'changeMonth' => true,
                                        //'yearRange' => '2000',
                                ),
                                'htmlOptions' => array('id' => 'guarantee_period','class' => 'input-medium')
                ));
        ?>
		<?php echo $form->error($model,'guarantee_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice'); ?>
		<?php echo $form->textField($model,'invoice'); ?>
		<?php echo $form->error($model,'invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'assigned'); ?>
		<?php echo $form->checkBox($model,'assigned', array('checked'=>false)); ?>
		<?php echo $form->error($model,'assigned'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkBox($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
		<?php echo ($model->isNewRecord)? CHtml::submitButton('Agregar +') : ''; ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->