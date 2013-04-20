<?php
/* @var $this AccesoryController */
/* @var $model Accesory */

$this->breadcrumbs=array(
	'Accesorios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Accesorios', 'url'=>array('index')),
	array('label'=>'Administrar Accesorio', 'url'=>array('admin')),
);
?>

<h1>Crear Accesorio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>