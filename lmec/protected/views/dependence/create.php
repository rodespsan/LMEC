<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista Dependencias', 'url'=>array('index')),
	array('label'=>'Administrar Dependencias', 'url'=>array('admin')),
);
?>

<h1>Crear Dependencia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>