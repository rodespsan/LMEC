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



	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'spare_parts_type_id'); ?>
		<?php echo $form->dropDownList(
				$model,
				'spare_parts_type_id',
				CHtml::listData(
					SparePartsType::model()->findAll(
						array(
							'condition'=>'active =1 '
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
						'data'=> array(
							'SparePartsOrder[spare_parts_type_id]'=>'js:this.value'
						),
						'update'=> '#SparePartsOrder_spare_parts_id',
					),
				)
		); ?>
		<?php echo $form->error($model,'spare_parts_type_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'spare_parts_id'); ?>
		<?php echo $form->dropDownList(
				$model,
				'spare_parts_id',
				CHtml::listData(
					SpareParts::model()->findAll(
						array(
							'condition'=>'active =1 '
						)
					),
					'id',
					'name'
				),
				array(
					'prompt' => 'Seleccionar',
				)
		); ?>

		<?php echo CHtml::Button(
			'+'
		); ?>
		
		<?php echo $form->error($model,'spare_parts_id'); ?>
	</div>

	<div class="row buttons">

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>




<div>    
    <div style="text-align:center; margin: 10px 0 -30px 0"><h5>Refacciones Realizadas</h5></div>

		<?php
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'spare-parts-order-grid',
			//'dataProvider'=>$model->search(),
			'dataProvider'=> new CActiveDataProvider('SparePartsOrder'
				/*array(
					'criteria'=>array(
						//'spare_parts_order_id=:spare_parts_order_id',
						//'condition'=>'active=1',
					),
					#'params'=> array(
					#	':spare_parts_order_id' => $model->id,
					#),
					'pagination'=>array(
						'pageSize'=>20,
					),
				)*/
			),
			'columns'=>array(
				'id',
				'spareParts',
				array(
					'class'=>'CButtonColumn',
					'template'=>'{delete}',
					'buttons'=>array(
						'delete'=>array(
							'url'=>'CController::createUrl("/sparePartsOrder/deleteSparePartOrder",array(
									"id"=>$data->id,
									"spare_parts_order_id"=>$data->spare_parts_order_id,
									"order_id"=>$data->order_id
							))'
						),
					),
				),	
			),
		));
		?>
	</div>
</div>

</div><!-- form -->