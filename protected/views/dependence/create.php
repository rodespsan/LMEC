<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	'Crear Dependencia',
);

$this->menu=array(
	array('label'=>'Listar Dependencia', 'url'=>array('index')),
	array('label'=>'Administrar Dependencia', 'url'=>array('admin')),
);
?>

<h1>Crear Dependencia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>