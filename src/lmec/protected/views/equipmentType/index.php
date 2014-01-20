<?php
$this->breadcrumbs=array(
	'Tipos de equipo',
);

$this->menu=array(
	array('label'=>'Crear tipo de equipo', 'url'=>array('create')),
	array('label'=>'Administrar tipos de equipo', 'url'=>array('admin')),
);
?>

<h1>Tipos de equipo</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting'=>true,
	'sortableAttributes'=>array(
		'type',
	),
)); ?>
