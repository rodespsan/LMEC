<?php
/* @var $this StatusOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Status Orders',
);

$this->menu=array(
	array('label'=>'Create StatusOrder', 'url'=>array('create')),
	array('label'=>'Manage StatusOrder', 'url'=>array('admin')),
);
?>

<h1>Status Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
