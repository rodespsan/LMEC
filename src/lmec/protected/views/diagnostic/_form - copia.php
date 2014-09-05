<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	//'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'observation'); ?>
		<?php echo $form->textArea($model,'observation',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelDiagnosticWork,'work_id');?>
		<?php echo $form->dropDownList(
			$modelDiagnosticWork,
			'work_id',
			Chtml::listData(
				Work::model()->findAll('active=1'),
				'id',
				'name'
			),
			array(
				'prompt'=>'Seleccionar'
			)
		);?>
		<?php echo CHtml::submitButton('Agregar +',array('id'=>'agregar','name'=>'agregar')); ?>
		<?php echo $form->error($modelDiagnosticWork,'work_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'finished'); ?>
		<?php echo $form->checkBox($model,'finished'); ?>
		<?php echo $form->error($model,'finished'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar',array('id'=>'guardar','name'=>'guardar')); ?> 			
	</div>
	
<?php $this->endWidget(); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'diagnostic-work-grid',
	'dataProvider' => new CActiveDataProvider('DiagnosticWork', array(
			'criteria'=>array(
				'condition' => 'diagnostic_id=:diagnostic_id',
				'params' => array(
					':diagnostic_id' => $model->id,
				),
			),
	)),
	'columns' => array
	(
		'work.id',
		'work.name',
         
        array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
            //'template' => '{view}{update}{delete}',
            'template' => '{delete}',
            'buttons'=>array(
            	'delete' => array(
            		'url' => 'CController::createUrl("/diagnostic/deleteDiagnosticWork",array("diagnostic_id" => $data->diagnostic_id, "work_id" => $data->work_id))',  //phpExpresion
            	),
            ),
        ),
        
    ),
)); ?>

</div><!-- form -->