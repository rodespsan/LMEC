<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	'Crear dependencia',
);

$this->menu=array(
	array('label'=>'Listar dependencias', 'url'=>array('index')),
	array('label'=>'Administrar dependencias', 'url'=>array('admin')),
);
?>

<h1>Crear dependencia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>