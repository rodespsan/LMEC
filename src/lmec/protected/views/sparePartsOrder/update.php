<?php
/* @var $this SparePartsOrderController */
/* @var $model SparePartsOrder */

$this->breadcrumbs=array(
	'Órdenes de Refacción'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Órdenes de Refacción', 'url'=>array('index')),
	array('label'=>'Crear Orden de Refacción', 'url'=>array('create')),
	array('label'=>'Ver Orden de Refacción', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Órdenes de Refacción', 'url'=>array('admin')),
);
?>

<h1>Actualizar Orden de Refacción <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>