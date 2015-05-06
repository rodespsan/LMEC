<?php
/* @var $this AccessoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accesorios',
);

$this->menu=array(
	array('label'=>'Crear accesorio', 'url'=>array('create')),
	array('label'=>'Administrar accesorio', 'url'=>array('admin')),
);
?>

<h1>Accesorios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting'=>true,
	'sortableAttributes'=>array(
	'name',
	),
)); ?>
