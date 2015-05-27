<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ordenes',
);

$this->menu=array(
	array('label'=>'Crear Nueva Orden', 'url'=>array('create')),
	array('label'=>'Administrar Ordenes', 'url'=>array('admin')),
	array('label'=>'Buscar', 'url'=>array('search')),
);
?>

<h1>Órdenes de Entrada</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
            'id'=>'ID',
            'customer_id'=>'Cliente',
            'date_hour',
            //'array($data->model->brand_id)'=>'Marca',
            'service_type_id'=>'Tipo de Servicio',
        ),
)); ?>


