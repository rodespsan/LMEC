<?php
/* @var $this StatusOrderController */
/* @var $model StatusOrder */

$this->breadcrumbs=array(
	'Estados de Orden'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estados de la Orden', 'url'=>array('index')),
	array('label'=>'Crear Estado de la Orden', 'url'=>array('create')),
	array('label'=>'Ver Estado de la Orden', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Estados de la Orden', 'url'=>array('admin')),
);
?>

<h1>Actualizar Estado de la Orden <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>