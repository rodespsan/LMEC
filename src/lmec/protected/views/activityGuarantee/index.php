<?php
/* @var $this ActivityGuaranteeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actividad de Garantía',
);

$this->menu=array(
	array('label'=>'Crear Actividad de Garantía', 'url'=>array('create')),
	array('label'=>'Administrar Actividades de Garantía', 'url'=>array('admin')),
);
?>

<h1>Actividades de Garantía</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
