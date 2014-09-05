<?php
/* @var $this RepairWorkController */
/* @var $model RepairWork */

$this->breadcrumbs=array(
	'Repair Works'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RepairWork', 'url'=>array('index')),
	array('label'=>'Manage RepairWork', 'url'=>array('admin')),
);
?>

<h1>Create RepairWork</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>