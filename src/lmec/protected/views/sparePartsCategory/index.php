<?php
/* @var $this SparePartsCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categorías de Refacciones',
);

$this->menu=array(
	array('label'=>'Crear Categoría de Refacción', 'url'=>array('create')),
	array('label'=>'Administrar Categorías de Refacción', 'url'=>array('admin')),
);
?>

<h1>Categorías de Refacciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
