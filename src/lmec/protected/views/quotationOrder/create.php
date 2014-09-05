<?php
/* @var $this QuotationOrderController */
/* @var $model QuotationOrder */

$this->breadcrumbs=array(
	'Cotización'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Cotizaciones', 'url'=>array('index')),
	array('label'=>'Administrar Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>Cotización</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>