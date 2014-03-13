<?php
/* @var $this SparePartsStatusController */
/* @var $model SparePartsStatus */

$this->breadcrumbs=array(
	'Estados de refacciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar estados de refacción', 'url'=>array('index')),
	array('label'=>'Crear estados de refacción', 'url'=>array('create')),
	array('label'=>'Ver estado de refacción', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar estados de refacción', 'url'=>array('admin')),
);
?>

<h1>Actualizar estado <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>