<?php
$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista Contactos', 'url'=>array('index')),
	array('label'=>'Crear Contacto', 'url'=>array('create')),
	array('label'=>'Ver Contacto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Contacto', 'url'=>array('admin')),
);
?>

<h1>Actualizar Contacto <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>