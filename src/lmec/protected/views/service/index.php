<?php
/* @var $this ServiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Servicios',
);

$this->menu=array(
	array('label'=>'Crear servicio', 'url'=>array('create')),
	array('label'=>'Administrar servicios', 'url'=>array('admin')),
);
?>

<h1>Servicios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
	'service_type_id','name','price'
	),
)); ?>

