<?php
$this->breadcrumbs=array(
	'Accesorios',
);

$this->menu=array(
	array('label'=>'Registrar accesorio', 'url'=>array('create')),
	array('label'=>'Administrador de accesorio', 'url'=>array('admin')),
);
?>

<h1>Accesories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
