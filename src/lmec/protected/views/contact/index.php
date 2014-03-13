<?php
$this->breadcrumbs=array(
	'Contactos',
);

$this->menu=array(
	array('label'=>'Crear contacto', 'url'=>array('create')),
	array('label'=>'Administrar contactos', 'url'=>array('admin')),
);
?>

<h1>Contactos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=>array(            
            'name',
            'email',
            'cell_phone_number',
            'telephone_number_house',
            'telephone_number_office',
        ),
)); ?>
