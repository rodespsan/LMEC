<?php
/* @var $this AccesoryController */
/* @var $model Accesory */

$this->breadcrumbs=array(
	'Accesorios'=>array('index'),
	$model->name,
);


$this->menu=array(
	array('label'=>'Listar Accesorios', 'url'=>array('index')),
	array('label'=>'Crear Accesorio', 'url'=>array('create')),
	array('label'=>'Actualizar Accesorio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Accesorio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea eliminar este Accesorio?'),'visible'=>$model->active==1),
	array('label'=>'Activar Accesorio',  'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este Accesorio?'),'visible'=>$model->active==0),
	array('label'=>'Administrar Accesorio', 'url'=>array('admin')),
);
?>

<h1>Accesorio: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
			'name' => 'Activo',
			'type' =>'raw',
			'value' => Accesory::getActive($model->active),
			),
	),
)); ?>
