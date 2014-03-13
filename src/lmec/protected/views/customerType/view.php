<?php
$this->breadcrumbs=array(
	'Tipos de cliente'=>array('index'),
	$model->type,
);


$this->menu=array(
	array('label'=>'Listar tipos de cliente', 'url'=>array('index')),
	array('label'=>'Crear tipo de cliente', 'url'=>array('create')),
	array('label'=>'Actualizar tipo de cliente', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Desactivar tipo de cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar este Tipo de cliente?'),'visible'=>$model->active==1),
	array('label'=>'Activar tipo de cliente',  'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este Tipo de cliente?'),'visible'=>$model->active==0),	
	array('label'=>'Administrar tipos de cliente', 'url'=>array('admin')),
);
?>

<h1>Tipo de cliente: <?php echo $model->type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
                array(
                    'label' => 'Activo',
                    'type' => 'raw',
                    'value' => CustomerType::getActive($model->active),
                ),
	),
)); ?>
