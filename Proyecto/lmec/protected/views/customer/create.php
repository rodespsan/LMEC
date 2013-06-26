<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Crear cliente',
);

$this->menu=array(
	array('label'=>'Listar clientes', 'url'=>array('index')),
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
);
?>

<h1>Crear cliente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>