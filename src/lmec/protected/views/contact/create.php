<?php
$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	'Crear contacto',
);

$this->menu=array(
	array('label'=>'Listar contactos', 'url'=>array('index')),
	array('label'=>'Administrar contactos', 'url'=>array('admin')),
);
?>

<h1>Crear contacto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>