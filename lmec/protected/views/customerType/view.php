<?php
$this->breadcrumbs=array(
	'Tipos de cliente'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Tipos de cliente', 'url'=>array('index')),
	array('label'=>'Crear Tipos de cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Tipos de cliente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Tipos de cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Tipos de cliente', 'url'=>array('admin')),
);
?>

<h1>Ver Tipos de cliente #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		//'active',
	),
)); ?>
