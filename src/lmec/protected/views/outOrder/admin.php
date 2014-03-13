<?php
/* @var $this OutOrderController */
/* @var $model OutOrder */

$this->breadcrumbs=array(
	'Salida de ordenes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar salidas', 'url'=>array('index')),
	//array('label'=>'Crear salida', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('out-order-grid', {
		data: $(this).serialize()
	});
	return false;
});
"); 
?>

<h1>Administrar salida de ordenes</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n  (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de b&uacute;squeda, para especificar como se debe realizar la comparaci&oacute;n.
</p>

<?php 
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'out-order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enableSorting' => true,
	'columns'=>array(
		array(
			'header'=>'Folio',
			'name'=>'order_id',
		),
		array(
		   'header'=>'Cliente',
		   'name'=>'_client',
		   'value'=>'$data->order->customer->name',
		),
		//'order.customer.name',
		//'contact.name',
		array(
		   'header'=>'Contacto',
		   'name'=>'contact_id',
		   'value'=>'$data->contact->name',
		),
		//'user.name',
		array(
		   'header'=>'Entregó',
		   'name'=>'user_id',
		   'value'=>'$data->user->name',
		),
		//'order.model.EquipmentType.type',
		array(
		   'header'=>'Tipo',
		   'name'=>'_equipment',
		   'value'=>'$data->order->model->EquipmentType->type',
		),
		//'order.model.Brand.name',
		array(
		   'header'=>'Marca',
		   'name'=>'_brand',
		   'value'=>'$data->order->model->Brand->name',
		),
		//'order.model.name',
		array(
		   'header'=>'Modelo',
		   'name'=>'_model',
		   'value'=>'$data->order->model->name',
		),
		//'order.serial_number',
		array(
		   'header'=>'No. Serie',
		   'name'=>'_serial',
		   'value'=>'$data->order->serial_number',
		),
		array(
		   'header'=>'Salida',
		   'name'=>'date_hour',
		),
		array(
		   'header'=>'Recibió',
		   'name'=>'name_receive_equipment',
		),
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList(
				'pageSize',
				$pageSize,
				array(10=>10,20=>20,30=>30,40=>40,50=>50),
				array(
					'prompt'=>'Paginacion',
					'onchange'=>"$.fn.yiiGridView.update('out-order-grid',{ data:{ pageSize: $(this).val() }})",
					)
			),
			'template'=>"{update}{view}{delete}{activate}",
            'deleteConfirmation' => '¿Esta seguro que desea desactivar esta salida de orden?',
                    'buttons' => array(
                            'activate'=>array(
                                    'label'=>'Activar',
                                    'url'=>'Yii::app()->createUrl("outOrder/activate", array("id"=>$data->id))',
                                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/active.png',
                                    'visible'=>'$data->active == 0',
                                    'click'=>'function()
                                                    {
                                                            return confirm(\'¿Esta seguro que desea activar esta orden de salida?\');
                                                    }',
                            ),                            
                            'delete'=>array(
                                    'visible'=>'$data->active == 1',
                                    'label'=>'Desactivar',
                                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/deactive.png',
                            ),
                    ),
		),
	),
)); ?>
<?php Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
	$('.change-pageSize').live('change',function(){
		$.fn.yiiGridView.update('out-order-grid',{ data:{ pageSize: $(this).val() }} ) 
		});
EOD
	,CClientScript::POS_READY);?>
