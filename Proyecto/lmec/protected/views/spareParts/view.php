<?php
/* @var $this SparePartsController */
/* @var $model SpareParts */

$this->breadcrumbs=array(
	'Refacciones'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Refacciones', 'url'=>array('index')),
	array('label'=>'Crear Refacción', 'url'=>array('create')),
	array('label'=>'Actualizar Refacción', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Refacción', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea desactivar la refacción?')),
	array('label'=>'Administrar Refacciones', 'url'=>array('admin')),
	
);
?>

<h1>Ver Refacción: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		//'spare_parts_status_id',
		array(
			'name' => 'spare_parts_status_id',
			'value' => $model->sparePartsStatus->description,
		),
		//'brand_id',
		array(
			'name' => 'brand_id',
			'value' => $model->brand->name,
		),
		//'provider_id',
		array(
			'name' => 'provider_id',
			'value' => $model->provider->name,
		),
		'serial_number',
		'price',
		'date_hour',
		'guarantee_period',
		'invoice',
		'description',
		//'active',
		array(
			'name' => 'Activo',
			'type' =>'raw',
			'value' => $model->getActiveText(),
		),
	),
)); ?>
