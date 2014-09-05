<?php
/* @var $this RepairController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reparaciones',
);

$this->menu=array(
//	array('label'=>'Crear Reparación', 'url'=>array('create')),
	array('label'=>'Administrar Reparaciones', 'url'=>array('admin')),
);
?>

<h1>Reparaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
