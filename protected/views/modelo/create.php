<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Modelos', 'url'=>array('index')),
	array('label'=>'Administrar Modelo', 'url'=>array('admin')),
);
?>

<h1>Crear Modelo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
