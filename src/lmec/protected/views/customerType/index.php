<?php
$this->breadcrumbs=array(
	'Tipos de cliente',
);


$this->menu=array(
	array('label'=>'Crear tipo de cliente', 'url'=>array('create')),
	array('label'=>'Administrar tipos de cliente', 'url'=>array('admin')),
);
?>

<h1>Tipos de cliente</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=>array(           
            'type',
        ),
)); ?>
