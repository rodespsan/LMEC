<?php
$this->breadcrumbs=array(
	'Accesories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Accesorios', 'url'=>array('index')),
	array('label'=>'Registrar accesorio', 'url'=>array('create')),
	array('label'=>'Actualizar accesorio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Accesorio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrador de accesorios', 'url'=>array('admin')),
);
?>

<h1>Ver accesorio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'active',
	),
)); ?>
