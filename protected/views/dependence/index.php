<?php
$this->breadcrumbs=array(
	'Dependencias',
);

$this->menu=array(
	array('label'=>'Crear Dependencia', 'url'=>array('create')),
	array('label'=>'Administrar Dependencia', 'url'=>array('admin')),
);
?>

<h1>Dependencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=>array(
            'id',
            'name',
            'telephone_number',
            'extension',
        ),
)); ?>
