<?php
$this->breadcrumbs=array(
	'Modelos',
);

$this->menu=array(
	array('label'=>'Crear modelo', 'url'=>array('create')),
	array('label'=>'Administrar modelo', 'url'=>array('admin')),
);
?>

<h1>Modelos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting'=>true,
	'sortableAttributes'=>array(
		'name','brand_id','equipment_type_id',
	),
)); ?>
