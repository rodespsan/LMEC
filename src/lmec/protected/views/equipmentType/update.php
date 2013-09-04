<?php
$this->breadcrumbs=array(
	'Tipos de equipo'=>array('index'),
	$model->type=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar tipos de equipo', 'url'=>array('index')),
	array('label'=>'Crear tipo de equipo', 'url'=>array('create')),
	array('label'=>'Ver tipo de equipo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar tipos de equipo', 'url'=>array('admin')),
);
?>

<h1>Actualizar tipo de equipo: <?php echo $model->type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>