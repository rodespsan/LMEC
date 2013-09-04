<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->user,
);

$this->menu=array(
	array('label'=>'Listar usuarios', 'url'=>array('index')),
	array('label'=>'Crear usuario', 'url'=>array('create')),
	array('label'=>'Actualizar usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Desactivar usuario?')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Usuario: <?php echo $model->user; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user',
		'name',
		'last_name',
		'email',
        array(
			'label'=>'Roles',
			'type'=>'raw',
			'value'=>$model->getRolesOfUser($model->id),
		),
		array(
			'name'=>'active',
			'value'=>$model->getActive($model->active),
		),
	),
)); ?>
