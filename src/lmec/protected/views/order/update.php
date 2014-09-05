<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Ordenes', 'url'=>array('index')),
	array('label'=>'Crear Orden', 'url'=>array('create')),
	array('label'=>'Ver Orden', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Ordenes', 'url'=>array('admin')),
);
?>

<h1>Orden <?php // echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 
                                               'modelAccesoryOrder'=> $modelAccesoryOrder,
                                               'modelEquipment_status'=> $modelEquipment_status,
                                               'modelServiceOrder'=> $modelServiceOrder 
                                            )); ?>