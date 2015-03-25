<?php
/* @var $this StatusOrderController */
/* @var $model StatusOrder */

$this->breadcrumbs=array(
	'Estados de la Orden'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estados de la Orden', 'url'=>array('index')),
	array('label'=>'Administrar Estados de la Orden', 'url'=>array('admin')),
);
?>

<h1>Crear Estado de la Orden</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>