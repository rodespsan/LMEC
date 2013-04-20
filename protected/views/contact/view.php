<?php
$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Contacto', 'url'=>array('index')),
	array('label'=>'Crear Contacto', 'url'=>array('create')),
	array('label'=>'Actualizar Contacto', 'url'=>array('update', 'id'=>$model->id)),
	($model->active == 1)?array('label'=>'Desactivar Contacto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar este Contacto?')):NULL,
	array('label'=>'Administrar Contacto', 'url'=>array('admin')),
);
?>

<h1>Contacto: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                /*
                array(
                    'label' => 'Cliente',
                    'value' => $model->customers[0]->name
                ),           
                 
                */
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
                    'value' => ($model->active == 1)?'Si':'No'
                ),                
            
	),
)); ?>

<br/>
<h2>Pertenece al cliente:</h2>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->customers[0],
	'attributes'=>array(
		'id',
                //'name',
                array(
                    'label' => 'Cliente',
                    'type' => 'raw',
                    'value' => CHtml::link($model->customers[0]->name,array('customer/view','id'=>$model->customers[0]->id))
                ),
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
		//'address',
		//'dependence_id',
                //'dependence.name',
                array(
                    'label' => 'Dependencia',
                    'type' => 'raw',
                    'value' => CHtml::link(($model->customers[0]->dependence != NULL)?$model->customers[0]->dependence->name:"",array('dependence/view','id'=>($model->customers[0]->dependence != NULL)?$model->customers[0]->dependence->id:""))
                ),
		//'active',
                /*array(
                    'label' => 'Activo',
                    'type' => 'raw',
                    'value' => ($model->active == 1)?'Si':'No'
                ),
                 
                 */
	),
)); ?>