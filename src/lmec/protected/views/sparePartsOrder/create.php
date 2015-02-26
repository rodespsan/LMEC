<?php
/* @var $this SparePartsOrderController */
/* @var $model SparePartsOrder */

$this->breadcrumbs=array(
	'Orden de Refacciones'=>array('/order/index'),
	'Asignar Refacciones',
);

$this->menu=array(
	array('label'=>'Listar Órdenes de Refacción', 'url'=>array('index')),
	array('label'=>'Administrar Órdenes de Refacción', 'url'=>array('admin')),
);
?>

<h1>Asignar Refacciones a la Orden <?php echo(str_pad($modelOrder->id, 5, "0", STR_PAD_LEFT))?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>