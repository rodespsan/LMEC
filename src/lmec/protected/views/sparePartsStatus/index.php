<?php
/* @var $this SparePartsStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estados de refacciones',
);

$this->menu=array(
	array('label'=>'Crear estado de refacción', 'url'=>array('create')),
	array('label'=>'Administrar estados de refacción', 'url'=>array('admin')),
);
?>

<h1>Estados de refacción</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting' => true,
	'sortableAttributes'=>array(
            'description',
            
    ),
)); ?>
