<?php
/* @var $this PaymentTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipos de Pagos',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Pago', 'url'=>array('create')),
	array('label'=>'Administrar Tipos de Pagos', 'url'=>array('admin')),
);
?>

<h1>Tipos de Pagos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
