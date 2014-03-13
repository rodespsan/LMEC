<?php
/* @var $this SparePartsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Refacciones',
);

$this->menu=array(
	array('label'=>'Crear refacción', 'url'=>array('create')),
	array('label'=>'Administrar refacciones', 'url'=>array('admin')),
	array('label'=>'Listar estados de refacción', 'url'=>array('sparePartsStatus/index')),
	array('label'=>'Crear estado de refacción', 'url'=>array('sparePartsStatus/create')),
	array('label'=>'Crear categoría de refacción', 'url'=>array('sparePartsCategory/create')),
	array('label'=>'Administrar estados de refacción', 'url'=>array('sparePartsStatus/admin')),
);
?>

<h1>Refacciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting' => true,
	'sortableAttributes'=>array(
            'brand',
			'spare_parts_status_id',
			'provider_id',
			'name',
			'serial_number'
            
        ),
)); ?>
