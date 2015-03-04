<?php
/* @var $this OutOrderController */
/* @var $model OutOrder */

$this->breadcrumbs=array(
	'Salida de ordenes'=>array('index'),
	$model->order_id,
);

$this->menu=array(
	array('label'=>'Listar salidas', 'url'=>array('index')),
	//array('label'=>'Crear salida', 'url'=>array('create')),
	array('label'=>'Actualizar salida', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar salida', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea desactivar esta salida de orden?')),
	array('label'=>'Administrar salidas', 'url'=>array('admin')),
	array('label'=>'Vista de impresión', 'url'=>array('print', 'id'=>$model->id)),
);
function unorderedList($items)
{
	$content = '<ul>';
	foreach($items as $item)
	{
		$content .= "<li>".$item."</li>";
	}
	$content .= '</ul>';
	return $content;
}

function unorderedWorks($items)
{
	$content = '';
	foreach($items as $item)
	{
		$content .= "Tipo de servicio: ".$item->serviceType->name;
		$content .= "<ul><li>Trabajo: ".$item->name."</li></ul>";
	}
	return $content;
}
?>

<h1>Salida de Orden <?php echo $model->order_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'label' => 'Número de Folio',
			'value' => $model->order->folio,
		),
		'order.customer.name',
		'contact.name',
		array(
			'label' => 'Usuario que entrega el equipo',
			'value' => $model->user->name,
		),
		'order.model.EquipmentType.type',
		'order.model.Brand.name',
		'order.model.name',
		'order.serial_number',
		'order.stock_number',
		array(
			'label'=>'Accesorios',
			'value'=> unorderedList(CHtml::listData($model->order->accesories,'id','name')),
			'type'=>'raw',
		),
		array(
			'label'=>'Servicio',
			'value'=> $model->lastService->service->name,
		),
		array(
			'label'=>'Trabajos realizados',
			'value'=> unorderedWorks(CHtml::listData($model->order->works,'id','dataActive')),
			'type'=>'raw',
		),
		array(
			'label'=>'Refacciones',
			'value'=> unorderedList(CHtml::listData($model->order->spareParts,'id','name')),
			'type'=>'raw',
		),
		array(
			'label' => 'Observación',
			'value' => $model->observation,
		),
		'date_hour',
		'total_price',
		'order.advance_payment',
		'name_receive_equipment',
	),
)); ?>
