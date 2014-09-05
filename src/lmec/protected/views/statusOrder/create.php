<?php
/* @var $this StatusOrderController */
/* @var $model StatusOrder */

$this->breadcrumbs=array(
	'Status Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatusOrder', 'url'=>array('index')),
	array('label'=>'Manage StatusOrder', 'url'=>array('admin')),
);
?>

<h1>Create StatusOrder</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>