<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Usuarios', 'url'=>array('index')),
	array('label'=>'Registrar usuario', 'url'=>array('create')),
	array('label'=>'Actualizar usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrador de usuarios', 'url'=>array('admin')),
);
?>

<h1>Ver usuario #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_name',
		'password',
		'name',
		'last_name',
		'email',
		'active',
	),
)); ?>
