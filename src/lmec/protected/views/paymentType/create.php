<?php
/* @var $this PaymentTypeController */
/* @var $model PaymentType */

$this->breadcrumbs=array(
	'Tipo de pagos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Pagos', 'url'=>array('index')),
	array('label'=>'Administrar Tipo de Pagos', 'url'=>array('admin')),
);
?>

<h1>Tipo de Pago</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>