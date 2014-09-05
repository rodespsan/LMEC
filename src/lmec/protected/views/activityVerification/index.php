<?php
/* @var $this ActivityVerificationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actividad de Verificación',
);

$this->menu=array(
	array('label'=>'Crear Actividad de Verificación', 'url'=>array('create')),
	array('label'=>'Administrar Actividad de Verificación', 'url'=>array('admin')),
);
?>

<h1>Actividades de Verificación</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
