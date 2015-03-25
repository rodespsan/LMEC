<?php
/* @var $this StatusOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estados de la Orden',
);

$this->menu=array(
	array('label'=>'Crear Estado de la Orden', 'url'=>array('create')),
	array('label'=>'Administrar Estados de la Orden', 'url'=>array('admin')),
);
?>

<h1>Estados de la Orden</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
