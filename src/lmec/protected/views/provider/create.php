<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Crear proveedor',
);

$this->menu=array(
	array('label'=>'Listar proveedores', 'url'=>array('index')),
	array('label'=>'Administrar proveedores', 'url'=>array('admin')),
);
?>

<h1>Crear proveedor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>