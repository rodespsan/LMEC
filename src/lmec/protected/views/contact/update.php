<?php
$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar contacto',
);

$this->menu=array(
	array('label'=>'Listar contactos', 'url'=>array('index')),
	array('label'=>'Crear contacto', 'url'=>array('create')),
	array('label'=>'Ver contacto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar contactos', 'url'=>array('admin')),
);
?>

<h1>Actualizar contacto: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>