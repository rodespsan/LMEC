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

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'customer_id',
			CHtml::listData(
				Customer::model()->findAll(array(
					'condition' => 'active = 1',
					'order' => 'name'
				)),
				'id',
				'name'
			),
			array(
				'prompt' => 'Seleccionar',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('order/contactsFromCustomer'),
					'data' => array(
						'Order[customer_id]' => 'js:this.value',
					),
					//'update' => '#Order_contact_id',
					'success'=> 'js:function(dataType){
						jsonObject = JSON.parse(dataType);
						
						$("#Order_contact_id").children().remove();
						
						for(i=0; i< jsonObject.contact_options.length; i++){
							$("#Order_contact_id").append( new Option(
								jsonObject.contact_options[i].name,
								jsonObject.contact_options[i].id
							));
						}
						
						$("#Order_payment_type_id > option:selected").removeAttr("selected");
						$("#Order_payment_type_id > option[value=" + jsonObject.customer_type + "]").attr("selected","selected");
						$("#Order_advance_payment").val(jsonObject.advance_payment);
					}',
					'error' => 'js:function(dataType){
						$("#Order_contact_id").children().remove();
						$("#Order_contact_id").append( new Option("Seleccionar"));
						$("#Order_payment_type_id > option[value=]").attr("selected","selected");
					}',
				),
			)
		); ?>
		<?php echo $form->error($model,'customer_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'contact_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'contact_id',
			CHtml::listData(
				Contact::model()->findAll(array(
					'with' => array(
						'customer'
					),
					'condition' => 't.active = 1 AND customer.id = :customer_id',
					'order' => 't.name',
					'params' => array(
						':customer_id'=>$model->customer_id
					)
				)),
				'id',
				'name'
			),
			array(
				'prompt' => 'Seleccionar',
			)
		); ?>
		<?php echo $form->error($model,'contact_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'receptionist_user_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'receptionist_user_id',
			CHtml::listData(
				User::model()->findAll(array(
					'with' => array(
						'roles'
					),
					'condition' => 'role_id = 3 AND t.active = 1'
				)),
				'id',
				'fullName'
			),
			array(
				'prompt' => 'Seleccionar',
			)
		); ?>
		<?php echo $form->error($model,'receptionist_user_id');
                
                
                
                ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'date_hour'); ?>
		<?php $this->widget('CJuiDateTimePicker',array(
			'model'=>$model,
			'attribute'=>'date_hour',
			'options'=>array(
				'dateFormat'=>'yy-mm-dd',
				'timeFormat'=>'hh:mm:ss',
				'pickerTimeFormat'=>'hh:mm:ss',
				'showSecond'=>true,
			)
		)); ?>
		<?php echo $form->error($model,'date_hour'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_type_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'payment_type_id',
			CHtml::listData(
				PaymentType::model()->findAll(array(
					'condition' => 'active=1'
				)),
				'id',
				'name'
			),
			array(
				'prompt' => 'Seleccionar',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('order/advancePaymentFromPaymentType'),
					'data' => array(
						'Order[payment_type_id]' => 'js:this.value',
					),
					'success'=> 'js:function(dataType){
						jsonObject = JSON.parse(dataType);
						
						$("#Order_advance_payment").children().remove();
						$("#Order_advance_payment").val(jsonObject.advance_payment);
					}',
					'error' => 'js:function(dataType){
//						$("#Order_contact_id").children().remove();
//						$("#Order_contact_id").append( new Option("Seleccionar"));
//						$("#Order_payment_type_id > option[value=]").attr("selected","selected");
					}',
				),
                               
			)
		); ?>
		<?php echo $form->error($model,'payment_type_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'equipment_type_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'equipment_type_id',
			CHtml::listData(
				EquipmentType::model()->findAll(array(
					'condition' => 'active=1',
					'order' => 'type'
				)),
				'id',
				'type'
			),
			array(
				'prompt' => 'Seleccionar',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('order/brandsFromEquipment'),
					'data' => array(
						'Order[equipment_type_id]' => 'js:this.value',
                                            
					),
					'success'=> 'js:function(dataType){
						jsonObject = JSON.parse(dataType);
						
						$("#Order_brand_id").children().remove();
						$("#Order_brand_id").append( new Option("Seleccionar", 0));
                                                        
						for(i=0; i< jsonObject.brands_options.length; i++){
							$("#Order_brand_id").append( new Option(
								jsonObject.brands_options[i].name,
								jsonObject.brands_options[i].id
							));
						}
						
						$("#Order_model_id").children().remove();
						$("#Order_model_id").append( new Option("Seleccionar", 0));
						
						for(i=0; i< jsonObject.models_type.length; i++){
							$("#Order_model_id").append( new Option(
								jsonObject.models_type[i].name,
								jsonObject.models_type[i].id
							));
						}						
					}',
					'error' => 'js:function(dataType){
						$("#Order_equipment_type_id").children().remove();
						$("#Order_equipment_type_id").append( new Option("Seleccionar"));
						$("#Order_brand_id > option[value=]").attr("selected","selected");
					}',
				),
			)
		); ?>
		<?php echo $form->error($model,'equipment_type_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'brand_id',
			CHtml::listData(
				Brand::model()->findAll(array(
					'condition' => 'active=1',
					'order' => 'name',
                                        
				)),
				'id',
				'name'
			),
			array(
				'prompt' => 'Seleccionar',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('order/modelsFromBrand'),
					'data' => array(
						'Order[brand_id]' => 'js:this.value',
						'Order[equipment_type_id]' =>'js:  $("#Order_equipment_type_id").val()',
					),             
					//'update' => '#Order_contact_id',
					'success'=> 'js:function(dataType){
						jsonObject = JSON.parse(dataType);
						
						$("#Order_model_id").children().remove();
						$("#Order_model_id").append( new Option("Seleccionar", 0));
						
						for(i=0; i< jsonObject.models_options.length; i++){
							$("#Order_model_id").append( new Option(
								jsonObject.models_options[i].name,
								jsonObject.models_options[i].id
							));
						}
					}',
					'error' => 'js:function(dataType){
						$("#Order_equipment_type_id").children().remove();
						$("#Order_equipment_type_id").append( new Option("Seleccionar"));
						$("#Order_brand_id > option[value=]").attr("selected","selected");
					}',
				),        
			)
		); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'model_id',
			CHtml::listData(
				Modelo::model()->findAll(array(
					'condition' => 'active=1',
					'order' => 'name'
				)),
				'id',
				'name'
			),
			array(
				'prompt' => 'Seleccionar'
			)
		); ?>
		<?php echo $form->error($model,'model_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_type_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'service_type_id',
			CHtml::listData(
				ServiceType::model()->findAll(array(
					'condition' => 'active=1'
				)),
				'id',
				'name'
			),
			array(
				'prompt' => 'Seleccionar',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('order/servicesFromServiceType'),
					'data' => array(
						'Order[service_type_id]' => 'js:this.value',
					),
					//'update' => '#Order_service',
					'success'=> 'js:function(dataType){
						jsonObject = JSON.parse(dataType);
						
						$("#Order_service").children().remove();
						$("#Order_service").append( new Option("Seleccionar", 0));
						
						for(i=0; i< jsonObject.services_options.length; i++){
							$("#Order_service").append( new Option(
								jsonObject.services_options[i].name,
								jsonObject.services_options[i].id
							));
						}
					}',
					'error' => 'js:function(dataType){
						$("#Order_service").children().remove();
						$("#Order_service").append( new Option("Seleccionar"));
					}',
				),
                               
			)
		); ?>
		<?php echo $form->error($model,'service_type_id'); ?>
	</div>
        
        
        <div class="row">
		<?php echo $form->labelEx($model,'service'); ?>
		<?php echo $form->dropDownList(
			$model,
			'service',
			CHtml::listData(
				Service::model()->findAll(array(
					'with' => array(
						'serviceType'
					),
					'condition' => 't.active = 1 AND serviceType.id = :service_type_id',
					'order' => 't.name',
					'params' => array(
						':service_type_id'=>$model->service_type_id
					)
				)),
				'id',
				'name'
			),
			array(
				'prompt' => 'Seleccionar',
                               
			)
		); ?>
		<?php echo $form->error($model,'service'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'serial_number'); ?>
		<?php echo $form->textField($model,'serial_number',array('size'=>50,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'serial_number'); ?>
	</div>
	
        <div class="row">
		<?php echo $form->labelEx($model,'stock_number'); ?>
		<?php echo $form->textField($model,'stock_number',array('size'=>50,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'stock_number'); ?>
	</div>
	
        
        <?php 
        
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/styles.css');
        Yii::app()->clientScript->registerScript('accessoriesScript',"


			$('#addAccesory').click(function(){
                            if($('#Order_accesory_id option:selected').val()){
                                $('#Order_accesory').append($('#Order_accesory_id option:selected').clone());  
                             }
			});
                        

                        $('#removeAccesory').click(function(){  
                                $('#Order_accesory option:selected').remove(); 
                                
                                
			});
                        

                        $('#order-form').submit(function(){
                            $('#Order_accesory option').attr('selected','selected');
                        });

		");
   
        
       
        
        
        ?>
        
        
        <div class="row">

        <?php echo $form->labelEx($model, 'accesory_id'); ?>
        <?php
        echo $form->dropDownList(
               $model, 'accesory_id', Chtml::listData(
                       Accesory::model()->findAll('active=1'), 'id', 'name'
                ), array(
            'prompt' => 'Seleccionar'
                )
        );
        ?>
            
       	<?php echo CHtml::button(
			'+',
			array(
				'id'=>'addAccesory',
			)
		); ?>
		<?php echo CHtml::button('-',
                        array(
                                'id'=>'removeAccesory'
                            )
                        ); ?>
            
            		<div>

                               
			<?php echo $form->dropDownList(
				$model,
				'accesory',
				CHtml::listData(Accesory::model()->findAllByPk($model->accesory),
                                        'id',
                                        'name'
                                        ),
				array(
					'multiple'=>'multiple',
					'size'=>'5',
					'style'=>'min-width:200px;'
				)
			); ?>

		</div>
            
        <?php echo $form->error($model, 'accesory'); ?>
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
		<?php echo $form->labelEx($model,'observation'); ?>
		<?php echo $form->textArea($model,'observation',array('maxlength' => 300, 'rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model,'observation'); ?>
	</div>
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'name_deliverer_equipment'); ?>
		<?php echo $form->textField($model,'name_deliverer_equipment',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_deliverer_equipment'); ?>
	</div>
        
        
        <div class="row">
		<?php echo $form->labelEx($model,'advance_payment'); ?>
		<?php echo $form->textField($model,'advance_payment',array('size'=>50,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'advance_payment'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>


        
        
</div><!-- form -->