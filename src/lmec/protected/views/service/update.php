<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar servicios', 'url'=>array('index')),
	array('label'=>'Crear servicio', 'url'=>array('create')),
	array('label'=>'Ver servicio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar servicios', 'url'=>array('admin')),
);
?>

<h1>Actualizar servicio: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>