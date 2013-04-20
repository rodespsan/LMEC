<?php
$this->breadcrumbs=array(
	'Tipos de cliente',
);


$this->menu=array(
	array('label'=>'Crear Tipo Cliente', 'url'=>array('create')),
	array('label'=>'Administrar Tipo Cliente', 'url'=>array('admin')),
);
?>

<h1>Tipos de cliente</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=>array(
            'id',
            'type',
        ),
)); ?>
