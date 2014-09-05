<?php
/* @var $this QuotationOrderController */
/* @var $model QuotationOrder */

$this->breadcrumbs=array(
	'Cotización'=>array('index'),
	$order = $model->order->Folio,
);

$this->menu=array(
	array('label'=>'Listar Cotizaciones', 'url'=>array('index')),
//	array('label'=>'Create QuotationOrder', 'url'=>array('create')),
	array('label'=>'Actualizar Cotización', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Cotización', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Cotizaciones', 'url'=>array('admin')),
);
?>

<h1> Cotización: <?php echo $order; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array(
                    'name'=>'order_id',
                    'value' => $order,
                ),
                array(
                    'name' => 'quotation_text',
                    'type' => 'html'
                ),
		
		'total_price',
		'data_hour',
	),
)); ?>
