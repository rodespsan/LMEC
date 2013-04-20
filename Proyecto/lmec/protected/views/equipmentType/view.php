<?php
$this->breadcrumbs=array(
	'Tipos de Equipo'=>array('index'),
	$model->type,
);

$this->menu=array(
	array('label'=>'Listar Tipo de Equipo', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Equipo', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo de Equipo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Tipo de Equipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea eliminar este elemento?'),'visible'=>$model->active==1),
	array('label'=>'Activar Tipo de Equipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este elemento?'),'visible'=>$model->active==0),
	array('label'=>'Administrar Tipo de Equipo', 'url'=>array('admin')),
);
?>

<h1>Tipo de Equipo: <?php echo $model->type; ?></h1>

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
