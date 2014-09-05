<?php
/* @var $this BlogGuaranteeController */
/* @var $model BlogGuarantee */

$this->breadcrumbs=array(
	'Bitácora de Garantía'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Bitácoras de Garantías', 'url'=>array('index')),
	array('label'=>'Administrar Bitácoras de Garantías', 'url'=>array('admin')),
);
?>

<h1>Bitácora de Garantía</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>