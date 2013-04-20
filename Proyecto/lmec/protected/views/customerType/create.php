<?php
$this->breadcrumbs=array(
	'Tipos de cliente'=>array('index'),
	'Crear Tipo Cliente',
);

$this->menu=array(
	array('label'=>'Listar Tipo Cliente', 'url'=>array('index')),
	array('label'=>'Administrar Tipo Cliente', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo Cliente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>