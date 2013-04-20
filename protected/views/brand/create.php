<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Marcas', 'url'=>array('index')),
	array('label'=>'Administrar Marcas', 'url'=>array('admin')),
);
?>

<h1>Crear Marca</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>