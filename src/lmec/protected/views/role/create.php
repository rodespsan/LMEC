<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar roles', 'url'=>array('index')),
	array('label'=>'Administrar roles', 'url'=>array('admin')),
);
?>

<h1>Crear rol</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>