<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar usuarios', 'url'=>array('index')),
	array('label'=>'Crear usuario', 'url'=>array('create')),
	array('label'=>'Ver usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar usuario: <?php echo $model->user; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>