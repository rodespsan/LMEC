<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Lista Dependencias', 'url'=>array('index')),
	array('label'=>'Crear Dependencia', 'url'=>array('create')),
	array('label'=>'Actualizar Dependencia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Dependencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Dependencias', 'url'=>array('admin')),
);
?>

<h1>Ver Dependencia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'address',
		'telephone_number',
		//'active',
	),
)); ?>
