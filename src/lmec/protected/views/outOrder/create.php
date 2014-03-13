<?php
/* @var $this OutOrderController */
/* @var $model OutOrder */

$this->breadcrumbs=array(
	'Orden'=>array('index'),
	'Salida',
);

$this->menu=array(
	array('label'=>'Listar Salidas', 'url'=>array('index')),
	array('label'=>'Administrar salidas', 'url'=>array('admin')),
);
?>

<h1>Salida del Equipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelOb'=>$modelOb)); ?>