<?php
/* @var $this BlogGuaranteeController */
/* @var $model BlogGuarantee */

$this->breadcrumbs=array(
	'Bitácora de Garantía'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Bitácoras de Garantías', 'url'=>array('index', 'id' => $model->order_id)),
	array('label'=>'Administrar Bitácoras de Garantías', 'url'=>array('admin')),
	array('label'=>'Finalizar Bitacora de Garantía', 'url'=>array('blogGuarantee/finish', 'id'=>$model->order_id)),
);
?>

<h1>Bitácora de Garantía</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>