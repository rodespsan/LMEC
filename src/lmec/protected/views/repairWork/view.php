<?php
/* @var $this RepairWorkController */
/* @var $model RepairWork */

$this->breadcrumbs=array(
	'Repair Works'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RepairWork', 'url'=>array('index')),
	array('label'=>'Create RepairWork', 'url'=>array('create')),
	array('label'=>'Update RepairWork', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RepairWork', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RepairWork', 'url'=>array('admin')),
);
?>

<h1>View RepairWork #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'work_id',
		'user_id',
		'repair_id',
		'date_hour',
	),
)); ?>
