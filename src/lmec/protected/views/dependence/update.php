<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar dependencia',
);

$this->menu=array(
	array('label'=>'Listar dependencias', 'url'=>array('index')),
	array('label'=>'Crear dependencia', 'url'=>array('create')),
	array('label'=>'Ver dependencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar dependencias', 'url'=>array('admin')),
);
?>

<h1>Actualizar dependencia: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>