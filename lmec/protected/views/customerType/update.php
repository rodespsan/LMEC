<?php
$this->breadcrumbs=array(
	'Tipos de cliente'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista Tipos de cliente', 'url'=>array('index')),
	array('label'=>'Crear Tipo de cliente', 'url'=>array('create')),
	array('label'=>'Ver Tipos de cliente', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tipos de cliente', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de cliente <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>