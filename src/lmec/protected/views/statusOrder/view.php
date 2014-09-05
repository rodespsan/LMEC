<?php
/* @var $this StatusOrderController */
/* @var $model StatusOrder */

$this->breadcrumbs=array(
	'Status Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatusOrder', 'url'=>array('index')),
	array('label'=>'Create StatusOrder', 'url'=>array('create')),
	array('label'=>'Update StatusOrder', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StatusOrder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatusOrder', 'url'=>array('admin')),
);
?>

<h1>View StatusOrder #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'status',
		'active',
	),
)); ?>
