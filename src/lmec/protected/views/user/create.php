<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar usuarios', 'url'=>array('index')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Crear usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>