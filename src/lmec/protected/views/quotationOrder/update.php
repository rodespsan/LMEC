<?php
/* @var $this QuotationOrderController */
/* @var $model QuotationOrder */

$this->breadcrumbs=array(
	'Cotización'=>array('index'),
	$model->order->Folio=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Cotizaciones', 'url'=>array('index')),
//	array('label'=>'Create QuotationOrder', 'url'=>array('create')),
	array('label'=>'Ver Cotización', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>Cotización <?php //echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>