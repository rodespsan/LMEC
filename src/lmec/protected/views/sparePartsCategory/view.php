<?php
/* @var $this SparePartsCategoryController */
/* @var $model SparePartsCategory */

$this->breadcrumbs=array(
	'Categorías de Refacción'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Categorías de Refacción', 'url'=>array('index')),
	array('label'=>'Crear Categoría de Refacción', 'url'=>array('create')),
	array('label'=>'Actualizar Categoría de Refacción', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Categoría de Refacción', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Categorías de Refacción', 'url'=>array('admin')),
);
?>

<h1>Ver Categoría de Refacción #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
	),
)); ?>
