<?php
/* @var $this AccesoryController */
/* @var $model Accesory */

$this->breadcrumbs=array(
	'Accesorios'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Accesorios', 'url'=>array('index')),
	array('label'=>'Crear Accesorio', 'url'=>array('create')),
	array('label'=>'Ver Accesorio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Accesorio', 'url'=>array('admin')),
);
?>

<h1>Actualizar accesorio: <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>