<?php
/* @var $this RepairWorkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Repair Works',
);

$this->menu=array(
	array('label'=>'Create RepairWork', 'url'=>array('create')),
	array('label'=>'Manage RepairWork', 'url'=>array('admin')),
);
?>

<h1>Repair Works</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
