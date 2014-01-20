<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar roles', 'url'=>array('index')),
	array('label'=>'Crear rol', 'url'=>array('create')),
	array('label'=>'Ver rol', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar roles', 'url'=>array('admin')),
);
?>

<h1>Actualizar rol: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>