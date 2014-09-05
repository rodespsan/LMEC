<?php
/* @var $this SparePartsStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estados de Refacciones',
);

$this->menu=array(
	array('label'=>'Crear Estado de Refacción', 'url'=>array('create')),
	array('label'=>'Administrar Estados de Refacción', 'url'=>array('admin')),
);
?>

<h1>Estados de Refacción</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting' => true,
	'sortableAttributes'=>array(
            'description',
            
    ),
)); ?>
