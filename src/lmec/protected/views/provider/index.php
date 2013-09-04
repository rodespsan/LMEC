<?php
$this->breadcrumbs=array(
	'Proveedores',
);

$this->menu=array(
	array('label'=>'Crear proveedor', 'url'=>array('create')),
	array('label'=>'Administrar proveedores', 'url'=>array('admin')),
);
?>

<h1>Proveedores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=>array(
            'name',
            'contact_name',
            'contact_email',
            'contact_telephone_number',
        ),
    
)); ?>
