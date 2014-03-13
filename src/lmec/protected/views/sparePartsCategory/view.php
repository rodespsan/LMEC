<?php
/* @var $this SparePartsCategoryController */
/* @var $model SparePartsCategory */

$this->breadcrumbs=array(
	'Spare Parts Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SparePartsCategory', 'url'=>array('index')),
	array('label'=>'Create SparePartsCategory', 'url'=>array('create')),
	array('label'=>'Update SparePartsCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SparePartsCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SparePartsCategory', 'url'=>array('admin')),
);
?>

<h1>View SparePartsCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
	),
)); ?>
