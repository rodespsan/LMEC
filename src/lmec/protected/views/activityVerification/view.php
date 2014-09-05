<?php
/* @var $this ActivityVerificationController */
/* @var $model ActivityVerification */

$this->breadcrumbs=array(
	'Actividad de Verificación'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Actividades de Verificación', 'url'=>array('index')),
	array('label'=>'Crear Actividad de Verificación', 'url'=>array('create')),
	array('label'=>'Actualizar Actividad de Verificación', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Actividad de Verificación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar esta actividad?'),'visible'=>$model->active==1),
	array('label'=>'Activar Actividad de Verificación',  'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este actividad?'),'visible'=>$model->active==0),
	array('label'=>'Administrar Actividades de Verificación', 'url'=>array('admin')),
);
?>

<h1>Actividad de Verificación:<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                array(
                    'name'=>'service_type_id',
                    'value'=> $model->serviceType->name
                ),
                array(
                    'name'=>'equipment_type_id',
                    'value'=> $model->equipmentType->type
                ),
		'activity',
		'description',
		array(
			'name' => 'active',
			'value'=> ActivityVerification::getActive($model->active),
			),
	),
)); ?>
