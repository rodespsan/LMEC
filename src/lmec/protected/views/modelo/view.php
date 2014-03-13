<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar modelos', 'url'=>array('index')),
	array('label'=>'Crear modelo', 'url'=>array('create')),
	array('label'=>'Actualizar modelo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar modelo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar este Modelo?'),'visible'=>$model->active==1),
	array('label'=>'Activar modelo',  'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este Accesorio?'),'visible'=>$model->active==0),
	array('label'=>'Administrar modelos', 'url'=>array('admin')),
);
?>

<h1>Modelo: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
		'name'=>'brand_id',
		'value'=>$model->Brand->name,
		),
		array(
		'name'=>'equipment_type_id',
		'value'=>$model->EquipmentType->type,
		),
		array(
			'name' => 'active',
			'value'=>Modelo::getActive($model->active),
			),
	),
)); ?>
