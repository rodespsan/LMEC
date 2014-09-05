<?php
/* @var $this SparePartsOrderController */
/* @var $model SparePartsOrder */

$this->breadcrumbs=array(
	'Spare Parts Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SparePartsOrder', 'url'=>array('index')),
	array('label'=>'Create SparePartsOrder', 'url'=>array('create')),
	array('label'=>'View SparePartsOrder', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SparePartsOrder', 'url'=>array('admin')),
);
?>

<h1>Update SparePartsOrder <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>