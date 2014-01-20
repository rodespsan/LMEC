<?php
$this->breadcrumbs=array(
	'Tipos de equipo'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar tipos de equipo', 'url'=>array('index')),
	array('label'=>'Administrar tipos de equipo', 'url'=>array('admin')),
);
?>

<h1>Crear tipo de equipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>