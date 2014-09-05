<?php
/* @var $this OutOrderController */
/* @var $model OutOrder */
/* @var $form CActiveForm */
?>
<div class="form">
<?php date_default_timezone_set('America/Mexico_City'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'out-order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php //echo $form->errorSummary(array($model, $model->order, $modelOb)); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php echo CHtml::encode($model->order->folio); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model->order,'customer_id'); ?>
		<?php echo CHtml::encode($model->order->customer->name,'customer_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'contact_id'); ?>
		<?php echo $form->dropDownList($model,'contact_id',$model->order->contacts);?> 
		<?php echo $form->error($model,'contact_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model,'user_id',$model->userLogued);?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
	
	<div class="row">
		<b><?php echo CHtml::encode('DESCRIPCIÓN'); ?></b>
		<?php echo $form->labelEx($model->order->modelo->EquipmentType,'type') ?>
		<?php echo CHtml::encode($model->order->modelo->EquipmentType->type);?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model->order->modelo->Brand,'name') ?>
		<?php echo CHtml::encode($model->order->modelo->Brand->name); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model->order->modelo,'name') ?>
		<?php echo CHtml::encode($model->order->modelo->name); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model->order,'serial_number') ?>
		<?php echo CHtml::encode($model->order->serial_number); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model->order,'stock_number') ?>
		<?php echo CHtml::encode($model->order->stock_number); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model->order,'Accesorios') ?>
		<?php $items = CHtml::listData($model->order->accessories,'id','names');
			echo "<ul>";
			foreach($items as $item){
				echo "<li>".CHtml::encode($item)."</li>";
			}
			echo "</ul>";
		?>
	</div>
	
	<div class="row">
		<table>
			<tr>
				<th width="300px"><?php echo $form->labelEx($model,'Servicio'); ?></th>
				<th><?php echo CHtml::encode('Precio'); ?></th>
			</tr>
			<tr>
				<td><?php echo CHtml::encode($model->lastService->service->name); ?></td>
				<td><?php echo CHtml::encode($model->lastService->price); ?></td>
			</tr>
		</table>
	</div>
	
	<div class="row">
		<table>
			<tr>
				<th width="300px"><?php echo CHtml::encode('Tipo de servicio') ?></th>
				<th><?php echo CHtml::encode('Trabajo') ?></th>
			</tr>
			<?php $works = CHtml::listData($model->order->works,'id','dataActive');
				foreach($works as $work){ ?>
				<tr>
					<td><?php echo CHtml::encode($work->serviceType->name); ?></td>
					<td><?php echo CHtml::encode($work->name); ?></td>
				</tr>
				<?php } ?>
		</table>
	</div>
	
	<div class="row">
		<?php $items = $model->order->spareParts; 
			if(!empty($items)){
		?>
			<table>
				<tr>
					<th width="300px">Refacciones</th>
					<th>Precio</th>
				</tr>
				<?php
				foreach($items as $item){ ?>
				<tr>
					<td><?php echo CHtml::encode($item->name); ?></td>
					<td><?php echo CHtml::encode($item->price); ?></td>
				</tr>
				<?php } ?>
			</table>
		<?php } ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($modelOb,'observation'); ?>
		<?php echo $form->textArea($modelOb, 'observation', array('maxlength' => 300, 'rows' => 6, 'cols' => 50));?>
		<?php echo $form->error($modelOb,'observation'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'date_hour'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
				'model'=>$model, 
				'attribute'=>'date_hour', 
						'mode'=>'datetime', 
				'options'=>array(
					'dateFormat'=>'yy/mm/dd',
				),
				'htmlOptions' => array(	
						'value' => date('Y/m/d H:i'),
					),
			));
		?>
		<?php echo $form->error($model,'date_hour'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'total_price'); ?>
		<?php echo $form->textField($model,'total_price',array('id'=>'total',
				'ajax'=>array(
                    'type'=>'POST',
                    'url'=> $this->createUrl('onChange'),
                    'update'=>'#result_price',
                ),
				'size'=>8,
				'maxlength'=>10,
				'value'=>$model->total_price,
				)
			); ?>
			<?php if($model->order->paymentType->name == 'Interno'){echo CHtml::encode('Exento de pago');}else{echo CHtml::encode('No exento de pago');} ?>
		<?php echo $form->error($model,'total_price'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model->order,'advance_payment'); ?>
		<?php $model->_advance_payment = $model->order->advance_payment;
				echo CHtml::encode($model->_advance_payment); ?>
	</div>
	
	<div class="row">
		<?php  echo $form->hiddenField($model,'_advance_payment'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Adeudo'); ?>
		<div id="result_price"><?php echo CHtml::encode($model->getDebit()); ?></div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_receive_equipment'); ?>
		<?php echo $form->textField($model,'name_receive_equipment',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_receive_equipment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
                <?php echo CHtml::Button('Cancelar', array('style' => 'margin-left: 10px', 'onClick' => 'history.go(-1)')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->