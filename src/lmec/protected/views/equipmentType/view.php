<?php
$this->breadcrumbs=array(
	'Tipos de equipo'=>array('index'),
	$model->type,
);

$this->menu=array(
	array('label'=>'Listar tipos de equipo', 'url'=>array('index')),
	array('label'=>'Crear tipo de equipo', 'url'=>array('create')),
	array('label'=>'Actualizar tipo de equipo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar tipo de equipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea eliminar este elemento?'),'visible'=>$model->active==1),
	array('label'=>'Activar tipo de equipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este elemento?'),'visible'=>$model->active==0),
	array('label'=>'Administrar tipos de equipo', 'url'=>array('admin')),
);
?>

<h1>Tipo de equipo: <?php echo $model->type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		array(
			'name' => 'Activo',
			'type' =>'raw',
			'value'=>EquipmentType::getActive($model->active),
			),
	),
)); ?>
