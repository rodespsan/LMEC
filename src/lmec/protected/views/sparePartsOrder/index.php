<?php
/* @var $this SparePartsOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Órdenes de Refacción',
);

$this->menu=array(
	array('label'=>'Administrar órdenes de refacción', 'url'=>array('admin')),
);
?>

<h1>Órdenes de Refacciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
