<?php
$this->breadcrumbs=array(
	'Tipos de cliente'=>array('index'),
	$model->type=>array('view','id'=>$model->id),
	'Actualizar tipo de cliente',
);


$this->menu=array(
	array('label'=>'Listar tipos de cliente', 'url'=>array('index')),
	array('label'=>'Crear tipo de cliente', 'url'=>array('create')),
	array('label'=>'Actualizar tipo de cliente', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar tipos de cliente', 'url'=>array('admin')),
);
?>

<h1>Actualizar tipo de cliente: <?php echo $model->type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>