<?php
/* @var $this SparePartsOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spare Parts Orders',
);

$this->menu=array(
	array('label'=>'Create SparePartsOrder', 'url'=>array('/order/index')),
	array('label'=>'Manage SparePartsOrder', 'url'=>array('admin')),
);
?>

<h1>Spare Parts Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
