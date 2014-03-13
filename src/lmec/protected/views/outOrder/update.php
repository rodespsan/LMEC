<?php
/* @var $this OutOrderController */
/* @var $model OutOrder */

$this->breadcrumbs=array(
	'Salida de ordenes'=>array('index'),
	//$model->id=>array('view','id'=>$model->id),
	$model->order_id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar salidas', 'url'=>array('index')),
	//array('label'=>'Crear Salidas', 'url'=>array('create')),
	array('label'=>'Ver salida', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar salidas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Salida <?php echo $model->order_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelOb'=>$modelOb)); ?>