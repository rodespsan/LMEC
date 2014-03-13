<?php
/* @var $this SparePartsStatusController */
/* @var $model SparePartsStatus */

$this->breadcrumbs=array(
	'Estado de Refacciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar estados de refacción', 'url'=>array('index')),
	array('label'=>'Administrar estados de refacción', 'url'=>array('admin')),
);
?>

<h1>Crear estado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>