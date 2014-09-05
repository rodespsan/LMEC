<?php
/* @var $this ActivityGuaranteeController */
/* @var $model ActivityGuarantee */

$this->breadcrumbs=array(
	'Actividad de Garantía'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Actividades de Garantía', 'url'=>array('index')),
	array('label'=>'Crear Actividad de Garantía', 'url'=>array('create')),
	array('label'=>'Actualizar Actividad de Garantía', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Actividad de Garantía', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar esta actividad?'),'visible'=>$model->active==1),
	array('label'=>'Activar Actividad de Garantía',  'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este actividad?'),'visible'=>$model->active==0),
	array('label'=>'Administrar Actividades de Garantía', 'url'=>array('admin')),
);
?>

<h1>Actividad de Garantía: <?php echo $model->description; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		array(
			'name' => 'active',
			'value'=>  ActivityGuarantee::getActive($model->active),
			),
	),
)); ?>
