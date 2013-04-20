<?php
/* @var $this ServiceTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo de servicios',
);

$this->menu=array(
	array('label'=>'Crear tipo de servicios', 'url'=>array('create')),
	array('label'=>'Administrar tipo de servicios', 'url'=>array('admin')),
);
?>

<h1>Tipo de Servicios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
