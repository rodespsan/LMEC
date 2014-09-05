<?php
/* @var $this StatusOrderController */
/* @var $model StatusOrder */

$this->breadcrumbs=array(
	'Status Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatusOrder', 'url'=>array('index')),
	array('label'=>'Create StatusOrder', 'url'=>array('create')),
	array('label'=>'View StatusOrder', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StatusOrder', 'url'=>array('admin')),
);
?>

<h1>Update StatusOrder <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>