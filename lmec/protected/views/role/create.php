<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Registrar',
);

$this->menu=array(
	array('label'=>'Roles', 'url'=>array('index')),
	array('label'=>'Administrador de roles', 'url'=>array('admin')),
);
?>

<h1>Create Role</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>