<?php
/* @var $this RepairWorkController */
/* @var $model RepairWork */

$this->breadcrumbs=array(
	'Repair Works'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RepairWork', 'url'=>array('index')),
	array('label'=>'Create RepairWork', 'url'=>array('create')),
	array('label'=>'View RepairWork', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RepairWork', 'url'=>array('admin')),
);
?>

<h1>Update RepairWork <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>