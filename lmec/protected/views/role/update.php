<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Roles', 'url'=>array('index')),
	array('label'=>'Registrar rol', 'url'=>array('create')),
	array('label'=>'Ver rol', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrador de roles', 'url'=>array('admin')),
);
?>

<h1>Actualizar Role <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>