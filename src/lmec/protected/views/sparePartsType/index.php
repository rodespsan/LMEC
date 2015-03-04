<?php
/* @var $this SparePartsTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipos de Refacciones',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Refacción', 'url'=>array('create')),
	array('label'=>'Administrar Tipos de Refacción', 'url'=>array('admin')),
);
?>

<h1>Tipos de Refacciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
