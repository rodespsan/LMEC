<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear orden', 'url'=>array('create')),
	array('label'=>'Actualizar orden', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Listar órdenes', 'url'=>array('index')),
	array('label'=>'Administrar órdenes', 'url'=>array('admin')),
	array('label'=>'Buscar', 'url'=>array('search')),
	array('label'=>'Imprimir', 'url'=>array('print','id'=>$model->id), 'linkOptions'=>array('target'=>'_blank')),
	//Las siguientes opciones se muestran dependiendo del estado de la orden
    array('label'=>'Diagnosticar', 'url'=>array('diagnostic/create','id'=>$model->id,),'visible'=>Order::model()->getStatus_diagnostic_order($model->id)),
	array('label'=>'Asignar refacción ', 'url'=>array('spareParts/assign','id'=>$model->id),'visible'=>Order::model()->getStatus_refection_order($model->id)),
    array('label'=>'Asignar reparaciones', 'url'=>array('repair/create','id'=>$model->id),'visible'=>Order::model()->getStatus_repair_order($model->id)),
    array('label'=>'Garantía', 'url'=>array('blogguarantee/create','id'=>$model->id,),'visible'=>Order::model()->getStatus_guarantee_order($model->id)),
    array('label'=>'Crear orden salida', 'url'=>array('outOrder/create','id'=>$model->id), 'visible'=>Order::model()->getStatus_ready_order($model->id)),
	//array('label'=>'Imprimir', 'url'=>array('print','id'=>$model->id), 'linkOptions'=>array('target'=>'_blank')),
    //array('label'=>'Crear Diagnostico', 'url'=>array('createDiagnostic','id'=>$model->id)),
	//array('label'=>'Crear Diagnostico', 'url'=>array('createDiagnostic','id'=>$model->id)),

);
?>

<h1>Orden: <?php echo (str_pad($model->id, 5, "0", STR_PAD_LEFT)); ?></h1>


<?php

    $failureDescriptions =$model->failureDescriptions;
    $failureDescription_ = '<pre>';

    foreach ($failureDescriptions as $failureDescription){
        $failureDescription_.= $failureDescription->description;
    }

    $failureDescription_.= '</pre>';
 
    $equipmentStatuses =$model->equipmentStatuses;
    $equipmentStatuses_ = '<pre>';

    foreach ($equipmentStatuses as $equipmentStatus){     
     $equipmentStatuses_.= $equipmentStatus->description;
    }

    $equipmentStatuses_.= '</pre>';

    $accessories =$model->accessories;
    $accessories_ = '<ul>';

    foreach ($accessories as $accesory){     
     $accessories_.= '<li>'.$accesory->name.'</li>';
    }
    
    $accessories_ .= '<ul>';

    $observations_ = '<pre>';
    $observations_ .= $model->observation;
    $observations_ .= '</pre>';

?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'folio',
		'customer.name:text:Nombre de Cliente',
		'contact.name:text:Contacto',
		'receptionistUser.fullName:text:Recepcionista',
		'paymentType.name:text:Tipo de Pago',
        'modelo.EquipmentType.type:text:Tipo de Equipo',
		'modelo.Brand.name:text:Marca',
		'modelo.name:text:Modelo',
		'serviceType.name:text:Tipo de Servicio',
		array(
            'label'=>'Servicio',
            'value'=> $model->firstService->service->name,
        ),
		'date_hour',
		array(
			 'name' => 'accesory',
			 'value' => $accessories_,
			 'type'=> 'raw'
		),
		'serial_number',
		'stock_number',
                array(
                     'name' => '_failureDescription',
                     'value' => $failureDescription_,
                     'type'=> 'raw'
                ),
		array(
                     'name' => '_equipmentStatus',
                     'value' => $equipmentStatuses_,
                     'type'=> 'raw'
                ),
        array(
            'name' => 'observation',
            'value' => $observations_,
            'type' => 'raw'
            ),
//		'equipmentStatuses.description:text:Estado del Equipo',
		'name_deliverer_equipment',
                'advance_payment',
	),
)); ?>

<br>
<br>
<h1>Historial de la orden </h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'blog-order-grid',
	'template'=>'{items}{pager}',
	'dataProvider'=>new CActiveDataProvider('BlogOrder',array(
		'criteria'=>array(
			'condition' => 'order_id = :order_id',
			'params' => array(
				':order_id' => $model->id
			),
		)
	)),
	'columns'=>array(
		'activity',
		'userTechnical.fullName',
		'date_hour',
	),
)); ?>