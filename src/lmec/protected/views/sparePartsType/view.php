<?php
/* @var $this SparePartsTypeController */
/* @var $model SparePartsType */

$this->breadcrumbs=array(
	'Spare Parts Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SparePartsType', 'url'=>array('index')),
	array('label'=>'Create SparePartsType', 'url'=>array('create')),
	array('label'=>'Update SparePartsType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SparePartsType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SparePartsType', 'url'=>array('admin')),
);
?>

<h1>View SparePartsType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'activeText',
	),
)); ?>
