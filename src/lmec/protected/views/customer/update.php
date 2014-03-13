<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar cliente',
);

$this->menu=array(
	array('label'=>'Listar clientes', 'url'=>array('index')),
	array('label'=>'Crear cliente', 'url'=>array('create')),
	array('label'=>'Ver cliente', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
);
?>

<h1>Actualizar cliente: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>