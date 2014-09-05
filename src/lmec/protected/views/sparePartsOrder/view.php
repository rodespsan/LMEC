<?php
/* @var $this SparePartsOrderController */
/* @var $model SparePartsOrder */

$this->breadcrumbs=array(
	'Spare Parts Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SparePartsOrder', 'url'=>array('index')),
	array('label'=>'Create SparePartsOrder', 'url'=>array('/order/index')),
	array('label'=>'Update SparePartsOrder', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SparePartsOrder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SparePartsOrder', 'url'=>array('admin')),
);
?>

<h1>View SparePartsOrder #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
            'label' => 'Folio de la Orden',
            'value' => (str_pad($model->order_id, 5, "0", STR_PAD_LEFT)),
        ),
		'spareParts.sparePartsType.type:text:Tipo',
		'spareParts.name:text:Refacción',
	),
)); ?>
