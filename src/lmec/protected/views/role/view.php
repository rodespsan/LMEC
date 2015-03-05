<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar roles', 'url'=>array('index')),
);
?>

<h1>Rol: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'url_initial',
		'priority',
		array(
		'name'=>'active',
		'value'=>$model->getActive($model->active),
		),
	),
)); ?>
