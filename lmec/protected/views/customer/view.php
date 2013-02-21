<?php
$this->breadcrumbs=array(
	'Cliente'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Cliente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Clientes', 'url'=>array('admin')),
);
?>

<h1>Ver Cliente #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'customer_type_id',                
                'customerType.type',
		//'contact_id',
                'contact.name',
                'contact.email',
                'contact.cell_phone_number',
                'contact.telephone_number_house',
                'contact.telephone_number_office',
                'contact.extension_office',
		'address',
		//'dependence_id',
                'dependence.name',
		'active',
	),
)); ?>
