<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Roles', 'url'=>array('index')),
	array('label'=>'Registrar un rol', 'url'=>array('create')),
	array('label'=>'Actualizar rol', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrador de roles', 'url'=>array('admin')),
);
?>

<h1>Ver rol #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'role',
		'active',
	),
)); ?>
