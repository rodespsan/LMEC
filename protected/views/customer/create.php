<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Crear Cliente',
);

$this->menu=array(
	array('label'=>'Listar Cliente', 'url'=>array('index')),
	array('label'=>'Administrar Cliente', 'url'=>array('admin')),
);
?>

<h1>Crear Cliente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>