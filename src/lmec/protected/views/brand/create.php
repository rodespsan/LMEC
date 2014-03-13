<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar marcas', 'url'=>array('index')),
	array('label'=>'Administrar marcas', 'url'=>array('admin')),
);
?>

<h1>Crear marca</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>