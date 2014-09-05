<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Diagnostico'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<h1>Crear Diagnostico del folio:<?php echo CHtml::encode($model->id);?></h1>

<?php echo $this->renderPartial('_form_diagnostic', array('model'=>$model, 'model2'=> $model2)); ?>