<?php
/* @var $this SparePartsOrderController */
/* @var $model SparePartsOrder */

$this->breadcrumbs=array(
	'Órdenes de Refacción'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar órdenes de refacción', 'url'=>array('index')),
	array('label'=>'Administrar órdenes de refacción', 'url'=>array('admin')),
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
