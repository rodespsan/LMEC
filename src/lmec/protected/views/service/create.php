<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar servicios', 'url'=>array('index')),
	array('label'=>'Administrar servicios', 'url'=>array('admin')),
);
?>

<h1>Crear servicios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>