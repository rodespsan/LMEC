<?php
/* @var $this ActivityGuaranteeController */
/* @var $model ActivityGuarantee */

$this->breadcrumbs=array(
	'Actividad de Garantía'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Actividades de Garantía', 'url'=>array('index')),
	array('label'=>'Crear Actividad de Garantía', 'url'=>array('create')),
	array('label'=>'Ver Actividad de Garantía', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Actividades de Garantía', 'url'=>array('admin')),
);
?>

<h1>Actividad de Garantía <?php // echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>