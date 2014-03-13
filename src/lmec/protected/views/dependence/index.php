<?php
$this->breadcrumbs=array(
	'Dependencias',
);

$this->menu=array(
	array('label'=>'Crear dependencia', 'url'=>array('create')),
	array('label'=>'Administrar dependencias', 'url'=>array('admin')),
);
?>

<h1>Dependencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=>array(            
            'name',
            'telephone_number',
            'extension',
        ),
)); ?>
