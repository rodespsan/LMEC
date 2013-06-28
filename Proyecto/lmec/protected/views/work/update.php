<?php
/* @var $this WorkController */
/* @var $model Work */

$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar trabajos', 'url'=>array('index')),
	array('label'=>'Crear trabajos', 'url'=>array('create')),
	array('label'=>'Ver trabajos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar trabajos', 'url'=>array('admin')),
);
?>

<h1>Actualizar trabajo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>