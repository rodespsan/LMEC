<?php
/* @var $this ServiceTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipos de servicio',
);

$this->menu=array(
	array('label'=>'Crear tipo de servicio', 'url'=>array('create')),
	array('label'=>'Administrar tipos de servicio', 'url'=>array('admin')),
);
?>

<h1>Tipo de servicio</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
