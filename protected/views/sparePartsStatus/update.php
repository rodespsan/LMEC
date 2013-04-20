<?php
/* @var $this SparePartsStatusController */
/* @var $model SparePartsStatus */

$this->breadcrumbs=array(
	'Estados de Refacciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estados de Refacción', 'url'=>array('index')),
	array('label'=>'Crear Estados de Refacción', 'url'=>array('create')),
	array('label'=>'Ver Estado de Refacción', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Estados de Refacción', 'url'=>array('admin')),
);
?>

<h1>Actualizar Estado <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>