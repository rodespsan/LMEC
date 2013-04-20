<?php
$this->breadcrumbs=array(
	'Tipos de Equipo'=>array('index'),
	$model->type=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Equipo', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Equipo', 'url'=>array('create')),
	array('label'=>'Ver Tipo de Equipo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tipo de Equipo', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Equipo: <?php echo $model->type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>