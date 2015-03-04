<?php
/* @var $this SparePartsCategoryController */
/* @var $model SparePartsCategory */

$this->breadcrumbs=array(
	'Categorías de Refacciones'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Categorías de Refacción', 'url'=>array('index')),
	array('label'=>'Crear Categoría de Refacción', 'url'=>array('create')),
	array('label'=>'Ver Categoría de Refacción', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Categorías de Refacción', 'url'=>array('admin')),
);
?>

<h1>Actualizar Categoría de Refacción <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>