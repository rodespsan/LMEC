<?php
$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
	array('label'=>'Crear usuario', 'url'=>array('create')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>
<h1>Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
		'user','name','last_name','email'
	),
)); ?>
