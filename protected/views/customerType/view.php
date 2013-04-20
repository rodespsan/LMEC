<?php
$this->breadcrumbs=array(
	'Tipos de cliente'=>array('index'),
	$model->type,
);


$this->menu=array(
	array('label'=>'Listar Tipo Cliente', 'url'=>array('index')),
	array('label'=>'Crear Tipo Cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo Cliente', 'url'=>array('update', 'id'=>$model->id)),
	($model->active == 1)?array('label'=>'Desactivar Tipo Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar este Tipo Cliente?')):NULL,
	array('label'=>'Administrar Tipo Cliente', 'url'=>array('admin')),
);
?>

<h1>Tipo Cliente: <?php echo $model->type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		//'active',
                array(
                    'label' => 'Activo',
                    'type' => 'raw',
                    'value' => ($model->active == 1)?'Si':'No'
                ),
	),
)); ?>
