<?php
$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	'Crear Contacto',
);

$this->menu=array(
	array('label'=>'Listar Contacto', 'url'=>array('index')),
	array('label'=>'Administrar Contacto', 'url'=>array('admin')),
);
?>

<h1>Crear Contacto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>