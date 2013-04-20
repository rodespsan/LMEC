<?php
/* @var $this WorkController */
/* @var $model Work */

$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Trabajos', 'url'=>array('index')),
	array('label'=>'Crear Trabajos', 'url'=>array('create')),
	array('label'=>'Ver Trabajos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Trabajos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Trabajo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>