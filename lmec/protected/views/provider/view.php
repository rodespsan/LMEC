<?php
$this->breadcrumbs=array(
	'Proveedor'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Actualizar Proveedor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Proveedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Proveedor', 'url'=>array('admin')),
);
?>

<h1>Ver Proveedor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'provider_name',
		'contact_name',
		'contact_email',
		'contact_telephone_number',
		'address',
		//'active',
	),
)); ?>
