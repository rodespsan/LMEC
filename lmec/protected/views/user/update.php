<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Usuarios', 'url'=>array('index')),
	array('label'=>'Registrar usuario', 'url'=>array('create')),
	array('label'=>'Ver usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrador de usuarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar usuario <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>