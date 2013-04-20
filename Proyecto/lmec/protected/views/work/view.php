<?php
/* @var $this WorkController */
/* @var $model Work */

$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Trabajos', 'url'=>array('index')),
	array('label'=>'Crear Trabajo', 'url'=>array('create')),
	array('label'=>'Actualizar Trabajo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Trabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro de que desea desactivar este trabajo?')),
	array('label'=>'Administrar Trabajos', 'url'=>array('admin')),
);
?>

<h1>Ver Trabajo: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		//'description',
		array(
			'name' => 'description',
			'value' => $model->description,
		),
		array(
			'name' => 'service_type_id',
			'value' => $model->serviceType->name,
		),
		//'active',
		array(
			'name' => 'Activo',
			'type' =>'raw',
			'value' => $model->getActiveText(),
		),
	),
)); ?>
