<?php
/* @var $this SparePartsCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spare Parts Categories',
);

$this->menu=array(
	array('label'=>'Create SparePartsCategory', 'url'=>array('create')),
	array('label'=>'Manage SparePartsCategory', 'url'=>array('admin')),
);
?>

<h1>Spare Parts Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
