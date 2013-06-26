<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar proveedores', 'url'=>array('index')),
	array('label'=>'Crear proveedor', 'url'=>array('create')),
	array('label'=>'Actualizar proveedor', 'url'=>array('update', 'id'=>$model->id)),
	($model->active == 1)?array('label'=>'Desactivar proveedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar este Proveedor?')):NULL,
	array('label'=>'Administrar proveedores', 'url'=>array('admin')),
);
?>

<h1>Proveedor: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'contact_name',
		'contact_email',
		'contact_telephone_number',
		'address',
                array(
                    'label' => 'Activo',
                    'type' => 'raw',
                    'value' => Provider::getActive($model->active),
                ),
	),        
        
)); ?>
