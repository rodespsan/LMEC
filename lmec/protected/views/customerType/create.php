<?php
$this->breadcrumbs=array(
	'Tipos de cliente'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista Tipos de cliente', 'url'=>array('index')),
	array('label'=>'Administrar Tipos de cliente', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de cliente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>