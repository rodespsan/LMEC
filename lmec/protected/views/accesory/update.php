<?php
$this->breadcrumbs=array(
	'Accesorios'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Accesorios', 'url'=>array('index')),
	array('label'=>'Registrar accesorio', 'url'=>array('create')),
	array('label'=>'Ver accesorio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrador de accesorios', 'url'=>array('admin')),
);
?>

<h1>Actualizar accesorio<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>