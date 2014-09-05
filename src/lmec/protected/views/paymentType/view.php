<?php
/* @var $this PaymentTypeController */
/* @var $model PaymentType */

$this->breadcrumbs=array(
	'Tipos de Pagos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Tipos de Pagos', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Pago', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo de Pago', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Tipo de Pago', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Tipos de Pagos', 'url'=>array('admin')),
);
?>

<h1>Tipo de Pago: <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'advance_payment',
		array(
			'name' => 'active',
			'value'=> PaymentType::getActive($model->active),
			),
	),
)); ?>
