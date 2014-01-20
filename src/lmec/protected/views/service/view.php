<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar servicios', 'url'=>array('index')),
	array('label'=>'Crear servicio', 'url'=>array('create')),
	array('label'=>'Actualizar servicio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar servicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea desactivar este servicio?')),
	array('label'=>'Administrar servicios', 'url'=>array('admin')),
);
?>

<h1>Servicio: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
			'name'=>'price',
			'value'=>'$'.$model->price,
		),
		array(
			'name'=>'service_type_id',
			'value'=>$model->serviceType->name,
			 ),
		array(
			'name'=>'active',
			'value'=>$model->getActive($model->active),
		),
	),
)); ?>
