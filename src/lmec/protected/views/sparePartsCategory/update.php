<?php
/* @var $this SparePartsCategoryController */
/* @var $model SparePartsCategory */

$this->breadcrumbs=array(
	'Spare Parts Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SparePartsCategory', 'url'=>array('index')),
	array('label'=>'Create SparePartsCategory', 'url'=>array('create')),
	array('label'=>'View SparePartsCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SparePartsCategory', 'url'=>array('admin')),
);
?>

<h1>Update SparePartsCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>