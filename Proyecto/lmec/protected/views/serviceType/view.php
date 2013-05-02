<?php
/* @var $this ServiceTypeController */
/* @var $model ServiceType */

$this->breadcrumbs=array(
	'Tipo de servicios'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar tipo de servicios', 'url'=>array('index')),
	array('label'=>'Crear tipo de servicio', 'url'=>array('create')),
	array('label'=>'Actualizar tipo de servicio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar tipo de servicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea desactivar este servicio?')),
	array('label'=>'Administar tipo de servicios', 'url'=>array('admin')),
);
?>

<h1>Vista tipo de servicio: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
			'name'=>'active',
			'value'=>$model->getActive($model->active),
		),
	),
)); ?>
