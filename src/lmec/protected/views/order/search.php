<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Órdenes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista de Órdenes', 'url'=>array('index')),
	array('label'=>'Crear Orden', 'url'=>array('create')),
);



?>


<h1>Buscar</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de b&uacute;squeda, para especificar como se debe realizar la comparaci&oacute;n.
</p>
<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 	
?>



<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
<?php 
	
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>  $model->search(),
	'filter'=>$model,
	
	'columns'=>array(

		array(
			'name'=>'id',
			'header'=>'Folio',
			'value'=>'Order::model()->getFolio_($data->id)',
		),

		array(
			'name'=>'customer_id',
			'value'=>'$data->customer->name',
			'type'=>'text',
		),

		array(
			'name'=>'service_type_id',
			'value'=>'$data->serviceType->name',
			'type'=>'text',
		),

		// array(
		// 	'name'=>'id',
		// 	'value'=>'$data->service->name',
		// 	'type'=>'text',
		// ),
		
		array(
		'name'=>'date_hour',
		'type'=>'date',
		'header'=>'Fecha de Entrada',
		
		),
		
		array(
		'name'=>'model_id',
                'value'=>'$data->modelo->name',
		'type'=>'text',
		),
		
		
		array(
			'name'=>'type_search',
			'value'=>'$data->modelo->EquipmentType->type',
			'type'=>'text',
			// 'filter' => CHtml::listData(
			// 	equipmentType::model()->findAll(),
			// 	 'id',
			// 	 'type'
			// ),
        ),
		
		// array(
		// 	'name'=>'status_order_id',
		// 	'value'=>'$data->status_order_id',
		// 	'type'=>'raw',
		// 	'filter'=>CHtml::listData(statusOrder::model()->findAll(array(
		// 					"condition" => "active=1",
		// 					"params"=>array()
		// 				)), 'id', 'status'),
			
		// ),

		// array(
		// 	'name'=>'status_order_id',
		// 	'value'=>'CHtml::dropDownList(
		// 		"OrderGrid[$data->id][status_order_id]",
		// 		$data->status_order_id,
		// 	CHtml::listData(
		// 			($data->statusOrder->active)?
		// 				statusOrder::model()->findAll("active=1") : 
		// 				statusOrder::model()->findAll(array(
		// 					"condition" => "active=1 OR id=:status_id",
		// 					"params"=>array(
		// 						":status_id"=>$data->status_order_id
		// 					)
		// 				)),
		// 			"id",
		// 			"status"
		// 		)
		// 		)',
		// 	'type'=>'raw',
		// 	'filter'=>CHtml::listData(statusOrder::model()->findAll(array(
		// 					"condition" => "active=1",
		// 					"params"=>array()
		// 				)), 'id', 'status'),
			
		// ),

		array(
			'name'=>'status_order_id',
			'value'=>'$data->statusOrder->status',
			'type'=>'text',
		),
		
		// array(
		// 	'name'=>'technician_order_id',
		// 	'header'=>'Técnico',
		// 	'type'=>'raw',
		// 	'value'=>'$data->technician_order_id',
		// 	'filter'=>CHtml::listData(
		// 				User::model()->findAll(array(
		// 					"with" => array(
		// 							"roles"
		// 							),
		// 							"condition" => "role_id=2",
		// 						"params"=>array()
		// 					)),
		// 				"id",
		// 				"user"
		// 			),
		// ),

		// array(
		// 	'name'=>'technician_order_id',
		// 	'header'=>'Técnico',
		// 	'type'=>'raw',
		// 	'value'=>'CHtml::dropDownList(
		// 		"OrderGrid[$data->id][technician_order_id]",
		// 		$data->technician_order_id,
		// 		(empty($data->technicianUser))?
		// 			array("empty"=>"Sin asignar") + 
		// 			CHtml::listData(
		// 				User::model()->findAll(array(
		// 					"with" => array(
		// 							"roles"
		// 							),
		// 							"condition" => "t.active=1 AND role_id=2",
		// 						"params"=>array()
		// 					)),
		// 				"id",
		// 				"user"
		// 			)
		// 			:
		// 			CHtml::listData(
		// 				($data->technicianUser->active)?
		// 					User::model()->findAll(array(
		// 					"with" => array(
		// 							"roles"
		// 							),
		// 							"condition" => "t.active=1 AND role_id=2",
		// 						"params"=>array()
		// 					)) : 
		// 					User::model()->findAll(array(
		// 						"with" => array(
		// 							"roles"
		// 							),
		// 						"condition" => "(t.active=1 OR t.id=:technician_id) AND role_id=2",
		// 						"params"=>array(
		// 							":technician_id"=>$data->technician_order_id
		// 						)
		// 					)),
		// 				"id",
		// 				"user"
		// 			)
		// 	)',
		// 	'filter'=>CHtml::listData(
		// 				User::model()->findAll(array(
		// 					"with" => array(
		// 							"roles"
		// 							),
		// 							"condition" => "role_id=2",
		// 						"params"=>array()
		// 					)),
		// 				"id",
		// 				"user"
		// 			),
		// ),

		array(
			'name'=>'technician_order_id',
			'value'=>'($data->technicianUser != null)?$data->technicianUser->user:"Sin asignar"',
			'type'=>'text',
		),

		'serial_number',
		
		'stock_number',

		array(
			'name'=>'active',
			'value'=>'User::getActive($data->active)',
			'filter'=>array('0'=>'No','1'=>'Si'),
		),
		
		/*
		'date_hour',
		'advance_payment',
		'serial_number',
		'stock_number',
		'name_deliverer_equipment',
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList(
                'pageSize',
                $pageSize,
                array(10=>10,20=>20,30=>30,40=>40,50=>50),
                array(
					'prompt'=>'Paginación',
					'onchange'=>"$.fn.yiiGridView.update('order-grid',{ data:{ pageSize: $(this).val() }})",
				)
            ),
			'template'=>'{view}{activate}',
			'deleteConfirmation'=>'¿Desactivar Orden?',
			'buttons' => array(

				'activate'=>array(
					'label'=>'Activar',
                    'url'=>'Yii::app()->createUrl("order/activate", array("id"=>$data->id))',
                    'imageUrl'=>'../images/active.png',
					'visible'=>'$data->active == 0',
					'click'=>'function()
							{
								if(!confirm(\'¿Activar orden?\')){
										return false;
								}
								$.fn.yiiGridView.update(\'order-grid\',{
									type:\'POST\',
									url:$(this).attr(\'href\'),
									success:function(data){
									$.fn.yiiGridView.update(\'order-grid\');
									},
								});
								return false;
							}',
							
                ),
				'delete' => array(
                    'visible' => '$data->active == 1',
                    'label' => 'Desactivar',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/deactive.png',
				),
			),
			
		),
	),
));

?>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('order-grid');
}
</script>
<?php echo CHtml::ajaxSubmitButton('Filter',array('order/ajaxupdate'), array(),array("style"=>"display:none;")); ?>
<?php $this->endWidget(); ?> 
