<?php
/* @var $this SparePartsOrderController */
/* @var $model SparePartsOrder */

$this->breadcrumbs=array(
	'Órdenes de Refacción'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Órdenes de Refacción', 'url'=>array('index')),
	array('label'=>'Crear Orden de Refacción', 'url'=>array('/order/index')),
	array('label'=>'Actualizar Orden de Refacción', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Orden de Refacción', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Órdenes de Refacción', 'url'=>array('admin')),
);
?>

<h1>Ver Orden de Refacción #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
            'label' => 'Folio de la Orden',
            'value' => (str_pad($model->order_id, 5, "0", STR_PAD_LEFT)),
        ),
		'spareParts.sparePartsType.type:text:Tipo',
		'spareParts.name:text:Refacción',
	),
)); ?>
