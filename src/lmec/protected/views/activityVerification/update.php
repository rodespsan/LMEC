<?php
/* @var $this ActivityVerificationController */
/* @var $model ActivityVerification */

$this->breadcrumbs=array(
	'Actividad de Verificación'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Actividades de Verificación', 'url'=>array('index')),
	array('label'=>'Crear Actividad de Verificación', 'url'=>array('create')),
	array('label'=>'Ver Actividad de Verificación', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Actividades de Verificación', 'url'=>array('admin')),
);
?>

<h1>Actividad de Verificación</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>