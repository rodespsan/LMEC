<?php
$this->breadcrumbs=array(
	'Tipos de cliente'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar Tipo Cliente',
);


$this->menu=array(
	array('label'=>'Listar Tipo Cliente', 'url'=>array('index')),
	array('label'=>'Crear Tipo Cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo Cliente', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tipo Cliente', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tipo Cliente<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>