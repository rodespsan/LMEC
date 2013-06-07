<?php
/* @var $this SparePartsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Refacciones',
);

$this->menu=array(
	array('label'=>'Crear Refacción', 'url'=>array('create')),
	array('label'=>'Administrar Refacciones', 'url'=>array('admin')),
	array('label'=>'Listar Estados de Refacción', 'url'=>array('sparePartsStatus/index')),
	array('label'=>'Crear Estado de Refacción', 'url'=>array('sparePartsStatus/create')),
	array('label'=>'Administrar Estados de Refacción', 'url'=>array('sparePartsStatus/admin')),
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
