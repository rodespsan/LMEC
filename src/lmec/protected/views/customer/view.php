<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar clientes', 'url'=>array('index')),
	array('label'=>'Crear cliente', 'url'=>array('create')),
	array('label'=>'Crear contacto', 'url'=>array('contact/create', 'customer_id'=>$model->id)),
	array('label'=>'Actualizar cliente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar este Cliente y su(s) Contacto(s)?'),'visible'=>$model->active==1),
	array('label'=>'Activar cliente',  'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este Cliente y su(s) Contacto(s)?'),'visible'=>$model->active==0),
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
);
?>

<h1>Cliente: <?php echo $model->name; ?></h1>

   
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                'name',             
                'customerType.type',
		'address',
                'dependence.name',
                array(
                    'label' => 'Activo',
                    'type' => 'raw',
                    'value' => Customer::getActive($model->active),
                ),
	),
)); ?>
<br/>
<h2>Contacto(s): <?php echo count($model->contacts); ?></h2>
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
                        array(
                            'label' => 'Activo',
                            'type' => 'raw',
                            'value' => Contact::getActive($contacto->active)
                        ),
                ),
        ));
        echo '<br/>';
}
?>
<?php echo CHtml::link('Contacto +',array('contact/create','customer_id'=>$model->id)); ?>

