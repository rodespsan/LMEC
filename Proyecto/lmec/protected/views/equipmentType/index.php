<?php
$this->breadcrumbs=array(
	'Tipos de Equipo',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Equipo', 'url'=>array('create')),
	array('label'=>'Administrar Tipo de Equipo', 'url'=>array('admin')),
);
?>

<h1>Tipos de Equipo</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting'=>true,
	'sortableAttributes'=>array(
		'type',
	),
)); ?>
