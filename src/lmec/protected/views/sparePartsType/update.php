<?php
/* @var $this SparePartsTypeController */
/* @var $model SparePartsType */

$this->breadcrumbs=array(
	'Tipos de Refacciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Refacción', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Refacción', 'url'=>array('create')),
	array('label'=>'Ver Tipo de Refacción', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tipos de Refacción', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Refacción <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>