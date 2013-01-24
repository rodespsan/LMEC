<?php
$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista Contactos', 'url'=>array('index')),
	array('label'=>'Administrar Contacto', 'url'=>array('admin')),
);
?>

<h1>Crear Contacto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>