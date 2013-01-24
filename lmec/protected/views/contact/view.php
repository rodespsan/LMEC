<?php
$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Lista Contactos', 'url'=>array('index')),
	array('label'=>'Crear Contacto', 'url'=>array('create')),
	array('label'=>'Actualizar Contacto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Contacto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Contactos', 'url'=>array('admin')),
);
?>

<h1>Ver Contacto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'cell_phone_number',
		'telephone_number_house',
		'telephone_number_office',
		'extension_office',
		//'active',
	),
)); ?>
