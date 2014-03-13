<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$modelOut = new OutOrder;

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update Order', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
	array('label'=>'Crear Salida', 'url'=>array('/outOrder/create', 'id'=>$model->id), 'visible'=>$model->enableOutput() ),
	array('label'=>'Ver Salida', 'url'=>array('/outOrder/view', 'id'=>$modelOut->viewOutOrder($model->id) ), 'visible'=>!$model->enableOutput()),
	//array('label'=>'Eliminar Salida', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$modelOut->updateOutput($model->id)),'confirm'=>'Are you sure you want to delete this item?')),
);

function unorderedList($items)
{
	$content = '<ul>';
	foreach($items as $key => $item)
	{
		$content .= "<li>".$item."</li>";
	}
	$content .= '</ul>';
	return $content;
}
?>

<h1>Orden de entrada #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'customer_id',
		'receptionist_user_id',
		'payment_type_id',
		'model_id',
		'service_type_id',
		'date_hour',
		'advance_payment',
		'serial_number',
		'stock_number',
		'name_deliverer_equipment',
		array(
			'name'=>'accesories',
			'value'=>unorderedList(CHtml::listData($model->accesories,'id','name')),
			'type'=>'raw',
		),
	),
)); ?>
