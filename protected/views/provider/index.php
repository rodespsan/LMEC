<?php
$this->breadcrumbs=array(
	'Proveedores',
);

$this->menu=array(
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Administrar Proveedor', 'url'=>array('admin')),
);
?>

<h1>Proveedores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=>array(
            'id',
            'name',
            'contact_name',
            'contact_telephone_number',
        ),
    
)); ?>
