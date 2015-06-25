<?php
/* @var $this OrderController */
/* @var $model Order */
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/filterFocus.js", CClientScript::POS_END);

$this->breadcrumbs=array(
	'Órdenes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista de Órdenes', 'url'=>array('index')),
	array('label'=>'Crear Orden', 'url'=>array('create')),
	array('label'=>'Buscar', 'url'=>array('search')),
);
?>

<h1>Órdenes Asignadas</h1>

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
	'dataProvider'=>  $model->searchAssignedOrders(),
	'filter'=>$model,
	'afterAjaxUpdate'=>'afterAjaxUpdate',
		
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

		array(
			'name'=>'service',
			'value'=>'$data->lastService->name',
			'type'=>'text',
		),
		
		array(
		'name'=>'date_hour',
		'type'=>'text',
		'header'=>'Fecha de Entrada',
		
		),

		array(
			'header'=>'Fecha de Salida',
			'name' => 'out_date_hour',
			'value'=>'( $data->outOrder != null ) ? $data->outOrder->date_hour : null',
			'type'=>'text',
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
        ),

		array(
			'name'=>'status_order_id',
			'value'=>'$data->statusOrder->status',
			'type'=>'text',
		),

		array(
			'name'=>'_failureDescription',
			'value'=>'$data->failureDescription->description',
			'type'=>'text',
		),

		array(
			'name'=>'technician_order_id',
			'value'=>'($data->technicianUser != null)?$data->technicianUser->user:"Sin asignar"',
			'type'=>'text',
			'filter'=>false,
		),

		'serial_number',
		
		'stock_number',

		array(
			'name'=>'active',
			'value'=>'User::getActive($data->active)',
			'filter'=>array('0'=>'No','1'=>'Si'),
		),

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
			'template'=>'{view}',
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
