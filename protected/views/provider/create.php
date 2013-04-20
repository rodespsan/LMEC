<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Crear Proveedor',
);

$this->menu=array(
	array('label'=>'Listar Proveedor', 'url'=>array('index')),
	array('label'=>'Administrar Proveedor', 'url'=>array('admin')),
);
?>

<h1>Crear Proveedor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>