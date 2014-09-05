<?php
/* @var $this ActivityGuaranteeController */
/* @var $model ActivityGuarantee */

$this->breadcrumbs=array(
	'Actividad de Garantía'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Actividades de Garantía', 'url'=>array('index')),
	array('label'=>'Administrar Actividades de Garantía', 'url'=>array('admin')),
);
?>

<h1>Actividad de Garantía</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>