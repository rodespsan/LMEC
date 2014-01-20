<?php
$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
	array('label'=>'Crear cliente', 'url'=>array('create')),
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
);
?>

<h1>Clientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=>array(            
            'name',
        ),
)); ?>
