<?php
/* @var $this BlogGuaranteeController */
/* @var $model BlogGuarantee */

$this->breadcrumbs=array(
	'Blog Guarantees'=>array('index'),
	//$model->order->Folio=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Bitágoras de Garantías', 'url'=>array('index', 'id' => $model->order_id)),
//	array('label'=>'Create BlogGuarantee', 'url'=>array('create')),
	array('label'=>'Ver Bitágora de Garantía', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Bitágoras de Garantías', 'url'=>array('admin')),
);
?>

<h1>Bitácora de Garantía <?php // echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>