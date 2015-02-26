<?php
/* @var $this SparePartsTypeController */
/* @var $model SparePartsType */

$this->breadcrumbs=array(
	'Tipos de Refacciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Tipos de Refacción', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Refacción', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo de Refacción', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Tipo de Refacción', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Tipos de Refacción', 'url'=>array('admin')),
);
?>

<h1>Ver Tipo:  #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'activeText',
	),
)); ?>
