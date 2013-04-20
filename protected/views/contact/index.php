<?php
$this->breadcrumbs=array(
	'Contactos',
);

$this->menu=array(
	array('label'=>'Crear Contacto', 'url'=>array('create')),
	array('label'=>'Administrar Contacto', 'url'=>array('admin')),
);
?>

<h1>Contactos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=>array(
            'id',
            'name',
            'email',
            'cell_phone_number',
            'telephone_number_house',
            'telephone_number_office',
            //'extension_office',
        ),
)); ?>
