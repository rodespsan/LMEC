<?php
/* @var $this SparePartsTypeController */
/* @var $model SparePartsType */

$this->breadcrumbs=array(
	'Spare Parts Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SparePartsType', 'url'=>array('index')),
	array('label'=>'Create SparePartsType', 'url'=>array('create')),
	array('label'=>'View SparePartsType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SparePartsType', 'url'=>array('admin')),
);
?>

<h1>Update SparePartsType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>