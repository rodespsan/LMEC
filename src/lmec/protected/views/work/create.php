<?php
/* @var $this WorkController */
/* @var $model Work */

$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar trabajos', 'url'=>array('index')),
	array('label'=>'Administrar trabajos', 'url'=>array('admin')),
);
?>

<h1>Crear trabajos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>