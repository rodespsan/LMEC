<?php
/* @var $this SparePartsController */
/* @var $model SpareParts */

$this->breadcrumbs=array(
	'Refacciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Refacciones', 'url'=>array('index')),
	array('label'=>'Administrar Refacciones', 'url'=>array('admin')),
	array('label'=>'Listar Estados de Refacción', 'url'=>array('sparePartsStatus/index')),
	array('label'=>'Crear Estado de Refacción', 'url'=>array('sparePartsStatus/create')),
	array('label'=>'Administrar Estados de Refacción', 'url'=>array('sparePartsStatus/admin')),
);
?>

<h1>Crear Refacción</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>