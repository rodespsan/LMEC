<?php
/* @var $this ServiceTypeController */
/* @var $model ServiceType */

$this->breadcrumbs=array(
	'Tipos de Servicio'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar tipos de servicio', 'url'=>array('index')),
	array('label'=>'Crear tipo de servicio', 'url'=>array('create')),
	array('label'=>'Ver tipo de servicio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar tipos de servicio', 'url'=>array('admin')),
);
?>

<h1>Actualizar tipo de servicio <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>