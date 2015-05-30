<?php
/* @var $this SparePartsTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipos de Refacciones',
);

$this->menu=array(
	array('label'=>'Crear tipo de refacción', 'url'=>array('create')),
	array('label'=>'Administrar tipos de refacción', 'url'=>array('admin')),
	array('label'=>'Administrar refacciones', 'url'=>array('spareParts/admin')),
);
?>

<h1>Tipos de Refacciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
