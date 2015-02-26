<?php
/* @var $this SparePartsCategoryController */
/* @var $model SparePartsCategory */

$this->breadcrumbs=array(
	'Categoría de Refacciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Categorías de Refacción', 'url'=>array('index')),
	array('label'=>'Administrar Categorías de Refacción', 'url'=>array('admin')),
);
?>

<h1>Crear Categoría de Refacción</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>