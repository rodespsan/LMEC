<?php
$this->breadcrumbs=array(
	'Accesories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Accesorios', 'url'=>array('index')),
	array('label'=>'Administrador de accesorios', 'url'=>array('admin')),
);
?>

<h1>Create Accesory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>