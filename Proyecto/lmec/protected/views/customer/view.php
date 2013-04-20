<?php
$this->breadcrumbs=array(
	'Cliente'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Cliente', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Cliente', 'url'=>array('update', 'id'=>$model->id)),
	($model->active == 1)?array('label'=>'Desactivar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar este Cliente y sus Contacto?')):NULL,
	array('label'=>'Administrar Cliente', 'url'=>array('admin')),
);
?>

<h1>Cliente: <?php echo $model->name; ?></h1>

   
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                'name',
		//'customer_type_id',                
                'customerType.type',
                /*
                array(
                        'type' => 'raw',
                        'name'=>'Contactos',
                        'value'=> Customer::getContacts($model->id),
                ),                 
                */
		//'contact_id',
                //'contact.name',
                //'contact.email',
                //'contact.cell_phone_number',
                //'contact.telephone_number_house',
                //'contact.telephone_number_office',
                //'contact.extension_office',
		'address',
		//'dependence_id',
                'dependence.name',
		//'active',
                array(
                    'label' => 'Activo',
                    'type' => 'raw',
                    'value' => ($model->active == 1)?'Si':'No'
                ),
	),
)); ?>

<br/>
<h2>Contacto(s):</h2>
<?php
 foreach ($model->contacts as $contacto) {
     $this->widget('zii.widgets.CDetailView', array(
                'data'=>$contacto,
                'attributes'=>array(
                        'id',
                        'name',
                        'email',
                        'cell_phone_number',
                        'telephone_number_house',
                        'telephone_number_office',
                        'extension_office',
                        //'active',
                        array(
                            'label' => 'Activo',
                            'type' => 'raw',
                            'value' => ($contacto->active == 1)?'Si':'No'
                        ),
                ),
        ));
        echo '<br/>';
}

?>

