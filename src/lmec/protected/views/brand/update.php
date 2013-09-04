<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar marcas', 'url'=>array('index')),
	array('label'=>'Crear marca', 'url'=>array('create')),
	array('label'=>'Ver marca', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar marcas', 'url'=>array('admin')),
);
?>

<h1>Actualizar marca: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>