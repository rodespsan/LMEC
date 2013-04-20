<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar roles', 'url'=>array('index')),
	array('label'=>'Crear rol', 'url'=>array('create')),
	array('label'=>'Actualizar rol', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Desactivar rol?')),
	array('label'=>'Administrar roles', 'url'=>array('admin')),
);
?>

<h1>Rol: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'url_initial',
		'priority',
		array(
		'name'=>'active',
		'value'=>$model->getActive($model->active),
		),
	),
)); ?>
