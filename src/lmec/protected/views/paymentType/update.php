<?php
/* @var $this PaymentTypeController */
/* @var $model PaymentType */

$this->breadcrumbs=array(
	'Tipos de Pagos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Pagos', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Pago', 'url'=>array('create')),
	array('label'=>'Ver Tipo de Pago', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tipos de Pagos', 'url'=>array('admin')),
);
?>

<h1>Tipo de Pago <?php //echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>