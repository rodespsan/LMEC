<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar proveedor',
);

$this->menu=array(
	array('label'=>'Listar proveedores', 'url'=>array('index')),
	array('label'=>'Crear proveedor', 'url'=>array('create')),
	array('label'=>'Ver proveedor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar proveedores', 'url'=>array('admin')),
);
?>

<h1>Actualizar proveedor: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>