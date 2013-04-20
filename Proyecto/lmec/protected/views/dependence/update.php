<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar Dependencia',
);

$this->menu=array(
	array('label'=>'Listar Dependencia', 'url'=>array('index')),
	array('label'=>'Crear Dependencia', 'url'=>array('create')),
	array('label'=>'Ver Dependencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Dependencia', 'url'=>array('admin')),
);
?>

<h1>Actualizar Dependencia <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>