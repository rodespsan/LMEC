<?php
/* @var $this AccessoryController */
/* @var $model Accessory */

$this->breadcrumbs=array(
	'Accesorios'=>array('index'),
	$model->name,
);


$this->menu=array(
	array('label'=>'Listar accesorios', 'url'=>array('index')),
	array('label'=>'Crear accesorio', 'url'=>array('create')),
	array('label'=>'Actualizar accesorio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar accesorio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea eliminar este Accesorio?'),'visible'=>$model->active==1),
	array('label'=>'Activar accesorio',  'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este Accesorio?'),'visible'=>$model->active==0),
	array('label'=>'Administrar accesorio', 'url'=>array('admin')),
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
			'value' => Accessory::getActive($model->active),
			),
	),
)); ?>
