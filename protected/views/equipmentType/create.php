<?php
$this->breadcrumbs=array(
	'Tipos de Equipo'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Equipo', 'url'=>array('index')),
	array('label'=>'Administrar Tipo de Equipo', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de Equipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>