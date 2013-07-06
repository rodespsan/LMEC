<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar modelos', 'url'=>array('index')),
	array('label'=>'Administrar modelo', 'url'=>array('admin')),
);
?>

<h1>Crear modelo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
