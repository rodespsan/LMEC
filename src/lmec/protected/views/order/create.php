<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Ordenes', 'url'=>array('index')),
	array('label'=>'Administrar Ordenes', 'url'=>array('admin')),
);
?>

<h1>Orden</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>