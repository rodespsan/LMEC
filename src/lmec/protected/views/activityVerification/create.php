<?php
/* @var $this ActivityVerificationController */
/* @var $model ActivityVerification */

$this->breadcrumbs=array(
	'Actividad de Verificación'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Actividadesd de Verificación', 'url'=>array('index')),
	array('label'=>'Administrar Actividades de Verificación', 'url'=>array('admin')),
);
?>

<h1>Actividad de Verificación</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>