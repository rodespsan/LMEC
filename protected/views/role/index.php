<?php
$this->breadcrumbs=array(
	'Roles',
);

$this->menu=array(
	array('label'=>'Crear rol', 'url'=>array('create')),
	array('label'=>'Administrar roles', 'url'=>array('admin')),
);
?>

<h1>Roles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting'=>true,
	'sortableAttributes'=>array(
		'name',
	)
)); ?>
