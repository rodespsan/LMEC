<?php
/* @var $this SparePartsStatusController */
/* @var $model SparePartsStatus */

$this->breadcrumbs=array(
	'Estado de refacciones'=>array('index'),
	$model->description,
);

$this->menu=array(
	array('label'=>'Listar estados de refacción', 'url'=>array('index')),
	array('label'=>'Crear estado de refacción', 'url'=>array('create')),
	array('label'=>'Actualizar estado de refacción', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar estado de refacción', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea desactivar el estado?')),
	array('label'=>'Administrar estados de refacción', 'url'=>array('admin')),
);
?>

<h1>Ver estado: <?php echo $model->description; ?></h1>

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
