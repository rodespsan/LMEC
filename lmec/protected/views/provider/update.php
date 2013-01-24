<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Ver Proveedores', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>

<h1>Actualizar Proveedor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>