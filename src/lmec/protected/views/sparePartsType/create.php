<?php
/* @var $this SparePartsTypeController */
/* @var $model SparePartsType */

$this->breadcrumbs=array(
	'Spare Parts Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SparePartsType', 'url'=>array('index')),
	array('label'=>'Manage SparePartsType', 'url'=>array('admin')),
);
?>

<h1>Create SparePartsType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>