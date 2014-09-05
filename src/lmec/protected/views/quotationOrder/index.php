<?php
/* @var $this QuotationOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cotizaciones',
);

$this->menu=array(
//	array('label'=>'Create QuotationOrder', 'url'=>array('create')),
	array('label'=>'Administrar Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>Cotizaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
