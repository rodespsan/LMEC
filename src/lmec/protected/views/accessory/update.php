<?php
/* @var $this AccessoryController */
/* @var $model Accessory */

$this->breadcrumbs=array(
	'Accesorios'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar accesorios', 'url'=>array('index')),
	array('label'=>'Crear accesorio', 'url'=>array('create')),
	array('label'=>'Ver accesorio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar accesorio', 'url'=>array('admin')),
);
?>

<h1>Actualizar accesorio: <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>