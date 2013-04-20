<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar Proveedor',
);

$this->menu=array(
	array('label'=>'Listar Proveedor', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Ver Proveedor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Proveedor', 'url'=>array('admin')),
);
?>

<h1>Actualizar Proveedor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>