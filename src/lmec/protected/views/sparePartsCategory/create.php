<?php
/* @var $this SparePartsCategoryController */
/* @var $model SparePartsCategory */

$this->breadcrumbs=array(
	'Spare Parts Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SparePartsCategory', 'url'=>array('index')),
	array('label'=>'Manage SparePartsCategory', 'url'=>array('admin')),
);
?>

<h1>Create SparePartsCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>