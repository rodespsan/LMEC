<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Ordenes', 'url'=>array('index')),
	array('label'=>'Administrar Ordenes', 'url'=>array('admin')),
	array('label'=>'Buscar', 'url'=>array('search')),
);
?>

<h1>Orden</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>