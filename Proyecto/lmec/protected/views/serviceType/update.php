<?php
/* @var $this ServiceTypeController */
/* @var $model ServiceType */

$this->breadcrumbs=array(
	'Tipos de Servicios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar tipo de servicios', 'url'=>array('index')),
	array('label'=>'Crear tipo de servicios', 'url'=>array('create')),
	array('label'=>'Ver tipo de servicios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar tipo de servicios', 'url'=>array('admin')),
);
?>

<h1>Actualizar tipo de servicio <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>