<?php
/* @var $this OutOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Salida de ordenes',
);

$this->menu=array(
	//array('label'=>'Crear salida', 'url'=>array('create',)),
	array('label'=>'Administrar salidas', 'url'=>array('admin')),
);
?>

<h1>Órdenes de Salida</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
		'sortableAttributes'=>array(            
			'order_id'=>'Folio',
			//'order.customer.name'=>'Cliente',
			/*array(
			   'name'=>'_client',
			   'value'=>'$data->order->customer->name',
			),*/
			'date_hour',
			'name_receive_equipment',
		),
)); ?>
