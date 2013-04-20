<?php
/* @var $this WorkController */
/* @var $model Work */

$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Trabajos', 'url'=>array('index')),
	array('label'=>'Administrar Trabajos', 'url'=>array('admin')),
);
?>

<h1>Crear Trabajos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>