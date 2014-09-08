<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar órdenes', 'url'=>array('index')),
	array('label'=>'Crear órdenes', 'url'=>array('create')),
	array('label'=>'Actualizar órdenes', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Eliminar órdenes','url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar órdenes', 'url'=>array('admin')),
	array('label'=>'Imprimir', 'url'=>array('print','id'=>$model->id), 'linkOptions'=>array('target'=>'_blank')),
    //array('label'=>'Imprimir', 'url'=>array('print','id'=>$model->id), 'linkOptions'=>array('target'=>'_blank')),
    //array('label'=>'Crear Diagnostico', 'url'=>array('createDiagnostic','id'=>$model->id)),
    array('label'=>'Diagnosticar', 'url'=>array('diagnostic/create','id'=>$model->id,),'visible'=>Order::model()->getStatus_diagnostic_order($model->id)),
    //array('label'=>'Crear Diagnostico', 'url'=>array('createDiagnostic','id'=>$model->id)),
    //Pendiente parte de grisel array('label'=>'Asignar Refacción', 'url'=>array('sparePartsOrder/create','id'=>$model->id)),
    array('label'=>'Asignar refacción', 'url'=>array('sparePartsOrder/create','id'=>$model->id),'visible'=>Order::model()->getStatus_refection_order($model->id)),
    array('label'=>'Asignar reparaciones', 'url'=>array('repair/create','id'=>$model->id),'visible'=>Order::model()->getStatus_repair_order($model->id)),
    
    //array('label'=>'Administrar Refacciones', 'url'=>array('sparePartsOrder/admin')),

);
?>

<h1>Orden: <?php echo (str_pad($model->id, 5, "0", STR_PAD_LEFT)); ?></h1>


<?php

    $failureDescriptions =$model->failureDescriptions;
    $failureDescription_ = '';

    foreach ($failureDescriptions as $failureDescription){
        $failureDescription_.= $failureDescription->description;
    }
 
 
    $equipmentStatuses =$model->equipmentStatuses;
    $equipmentStatuses_ = '';

    foreach ($equipmentStatuses as $equipmentStatus){     
     $equipmentStatuses_.= $equipmentStatus->description;
    }

    $accessories =$model->accessories;
    $accessories_ = '<ul>';

    foreach ($accessories as $accesory){     
     $accessories_.= '<li>'.$accesory->name.'</li>';
    }
    
    $accessories_ .= '<ul>';

    
?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'label' => 'Folio de Entrada',
            'value' => (str_pad($model->id, 5, "0", STR_PAD_LEFT)),
        ),
		'customer.name:text:Nombre de Cliente',
		'contact.name:text:Contacto',
		'receptionistUser.name:text:Recepcionista',
		'paymentType.name:text:Tipo de Pago',
        'modelo.EquipmentType.type:text:Tipo de Equipo',
		'modelo.Brand.name:text:Marca',
		'modelo.name:text:Modelo',
		'serviceType.name:text:Tipo de Servicio',
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
            	'observation',
//		'equipmentStatuses.description:text:Estado del Equipo',
		'name_deliverer_equipment',
                'advance_payment',
	),
)); ?>