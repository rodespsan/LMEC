<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Marcas', 'url'=>array('index')),
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Ver Marca', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Marcas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Marca: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>