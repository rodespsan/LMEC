<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Modelos', 'url'=>array('index')),
	array('label'=>'Crear Modelo', 'url'=>array('create')),
	array('label'=>'Ver Modelo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Modelo', 'url'=>array('admin')),
);
?>

<h1>Actualizar Modelo: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>