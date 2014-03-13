<?php
/* @var $this AccesoryController */
/* @var $model Accesory */

$this->breadcrumbs=array(
	'Accesorios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar accesorios', 'url'=>array('index')),
	array('label'=>'Administrar accesorio', 'url'=>array('admin')),
);
?>

<h1>Crear accesorio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>