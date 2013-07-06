<?php
/* @var $this ServiceTypeController */
/* @var $model ServiceType */

$this->breadcrumbs=array(
	'Tipos de servicio'=>array('index'),
	'Crear tipo de servicio',
);

$this->menu=array(
	array('label'=>'Listar tipos de servicio', 'url'=>array('index')),
	array('label'=>'Administrar tipos de servicio', 'url'=>array('admin')),
);
?>

<h1>Crear tipo de servicio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>