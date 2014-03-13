<?php
$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar contactos', 'url'=>array('index')),
	array('label'=>'Crear contacto', 'url'=>array('create')),
	array('label'=>'Actualizar contacto', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Desactivar contacto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar este Contacto?'),'visible'=>$model->active==1),
	array('label'=>'Activar contacto',  'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este Contacto?'),'visible'=>$model->active==0),	
	array('label'=>'Administrar contactos', 'url'=>array('admin')),
);
?>

<h1>Contacto: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'cell_phone_number',
		'telephone_number_house',
		'telephone_number_office',
		'extension_office',
                array(
                    'label' => 'Activo',
                    'type' => 'raw',
                    'value' => Contact::getActive($model->active),
                ),                
            
	),
)); ?>

<br/>
<h2>Pertenece al cliente:</h2>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->customers[0],
	'attributes'=>array(
		'id',
                array(
                    'label' => 'Cliente',
                    'type' => 'raw',
                    'value' => CHtml::link($model->customers[0]->name,array('customer/view','id'=>$model->customers[0]->id))
                ),           
                'customerType.type',                
                array(
                    'label' => 'Dependencia',
                    'type' => 'raw',
                    'value' => CHtml::link(($model->customers[0]->dependence != NULL)?$model->customers[0]->dependence->name:"",array('dependence/view','id'=>($model->customers[0]->dependence != NULL)?$model->customers[0]->dependence->id:""))
                ),		
	),
)); ?>