<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar marcas', 'url'=>array('index')),
	array('label'=>'Crear marca', 'url'=>array('create')),
	array('label'=>'Actualizar marca', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar marca', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea desactivar la marca?')),
	array('label'=>'Administrar marcas', 'url'=>array('admin')),
);
?>

<h1>Marca: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
			'name' => 'Activo',
			'value' => Brand::getActive($model->active),
		),
	),
)); ?>
