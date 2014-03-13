<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar modelos', 'url'=>array('index')),
	array('label'=>'Crear modelo', 'url'=>array('create')),
	array('label'=>'Ver modelo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar modelo', 'url'=>array('admin')),
);
?>

<h1>Actualizar modelo: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>