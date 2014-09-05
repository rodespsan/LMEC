<?php
/* @var $this SparePartsStatusController */
/* @var $model SparePartsStatus */

$this->breadcrumbs=array(
	'Estado de Refacciones'=>array('index'),
	$model->description,
);

$this->menu=array(
	array('label'=>'Listar Estados de Refacción', 'url'=>array('index')),
	array('label'=>'Crear Estado de Refacción', 'url'=>array('create')),
	array('label'=>'Actualizar Estado de Refacción', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Estado de Refacción', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea desactivar el estado?')),
	array('label'=>'Administrar Estados de Refacción', 'url'=>array('admin')),
);
?>

<h1>Ver Estado: <?php echo $model->description; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		//'active',
		array(
			'name' => 'Activo',
			'type' =>'raw',
			'value' => $model->getActiveText(),
		),
	),
)); ?>
