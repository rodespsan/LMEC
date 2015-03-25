<?php
/* @var $this StatusOrderController */
/* @var $model StatusOrder */

$this->breadcrumbs=array(
	'Estados de la Orden'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Estados de la Orden', 'url'=>array('index')),
	array('label'=>'Crear Estado de la Orden', 'url'=>array('create')),
	array('label'=>'Actualizar Estado de la Orden', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Estado de la Orden', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Estados de la Orden', 'url'=>array('admin')),
);
?>

<h1>Ver Estado de la Orden #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'status',
		'active',
	),
)); ?>
