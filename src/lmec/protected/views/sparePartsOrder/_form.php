 <?php
/* @var $this SparePartsOrderController */
/* @var $model SparePartsOrder */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spare-parts-order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'htmlOptions'=> array(
			//'onsubmit'=>'return false'
	),
	'enableAjaxValidation'=>false,
)); ?>



	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php
		Yii::app()->clientScript->registerScript('spartsPartsScript',"
			$('#addSparePart').click(function(){
				if ($('#spare_parts_id option:selected').val()) {
					$('#SparePartsOrder_spareParts').append(
						$('#spare_parts_id option:selected').remove()
					);
				}
			});


			$('#removeSparePart').click(function(){
				$('#SparePartsOrder_spareParts option:selected').remove();
			});
		

			$('#spare-parts-order-form').submit(function(){
				$('#SparePartsOrder_spareParts option').attr('selected','selected');
			});
		");
	?>

	<div class="row">
		<?php echo $form->labelEx($model,'spare_parts_type_id'); ?>
		<?php echo $form->dropDownList(
				$model,
				'spare_parts_type_id',
				CHtml::listData(
					SparePartsType::model()->findAll(
						array(
							'condition'=>'active =1',
							'order' => 'type'
						)
					),
					'id',
					'type'
				),
				array(
					'prompt' => 'Seleccionar',
					'ajax' => array(
						'type'=>'POST',
						//Crea una url tipo controlador/acción
						'url'=> CController::createUrl('sparePartsOrder/sparePartsFromType'),
						'data'=> array('SparePartsOrder[spare_parts_type_id]'=>'js:this.value'),
						'update'=> '#spare_parts_id',
					),
				)
		); ?>
		<?php echo $form->error($model,'spare_parts_type_id'); ?>
	</div>
	

	<div class="row">

		<?php echo $form->labelEx($model,'spare_parts_id'); ?>
		<?php //echo $form->dropDownList(
		echo CHtml::dropDownList(
				//$model,
				'spare_parts_id',
				null,
				CHtml::listData(
					SpareParts::model()->findAll(
						array(
							'condition'=>'active =1 AND spare_parts_type_id = :spare_parts_type_id',
							'order'=>'name',
							'params' => array(
								':spare_parts_type_id'=>$model->spare_parts_type_id,
							),
						)
					),
					'id',
					'name'
				),
				array(
					'prompt' => 'Seleccionar',
				)
		); ?>

		
		<?php echo CHtml::button(
			'+',
			array(
				'id'=>'addSparePart',
			)
		); ?>
		<?php echo CHtml::button(
			'-',
			array(
				'id'=> 'removeSparePart'
			)
		); ?>
		
		<div class="row">
			<?php echo CHtml::encode('Número de Serie'); ?>
		</div>
	
		<div>

			<?php echo $form->dropDownList(
				$model,
				'spareParts',
				CHtml::listData(
					SpareParts::model()->findAllByPk($model->spareParts),
					'id',
					'name'
				),
				array(
					'multiple'=>'multiple',
					'size'=>'5',
					'style'=>'min-width:300px;'
				)
			); ?>

		</div>
		<?php echo $form->error($model,'spareParts'); ?>
	</div>

	<div class="row buttons">

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->