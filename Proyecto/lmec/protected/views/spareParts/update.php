<?php
/* @var $this SparePartsController */
/* @var $model SpareParts */

$this->breadcrumbs=array(
	'Refacciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Refacciones', 'url'=>array('index')),
	array('label'=>'Crear Refacción', 'url'=>array('create')),
	array('label'=>'Ver Refacción', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Refacciones', 'url'=>array('admin')),
);
?>

<h1>Actualizar Refacción <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>