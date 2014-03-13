<?php
/* @var $this SparePartsController */
/* @var $model SpareParts */

$this->breadcrumbs=array(
	'Refacciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar refacciones', 'url'=>array('index')),
	array('label'=>'Crear refacción', 'url'=>array('create')),
	array('label'=>'Ver refacción', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar refacciones', 'url'=>array('admin')),
);
?>

<h1>Actualizar refacción <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>