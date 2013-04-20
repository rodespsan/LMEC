<?php
/* @var $this WorkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trabajos',
);

$this->menu=array(
	array('label'=>'Crear Trabajo', 'url'=>array('create')),
	array('label'=>'Administrar Trabajos', 'url'=>array('admin')),
);
?>

<h1>Trabajos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting'=>true,
	'sortableAttributes'=>array(
		'service_type_id'=>'Tipo de Servicio',
		'name'=>'Trabajo',
	),
)); ?>