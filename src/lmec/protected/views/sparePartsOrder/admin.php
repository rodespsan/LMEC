<?php
/* @var $this SparePartsOrderController */
/* @var $model SparePartsOrder */

$this->breadcrumbs=array(
	'Órdenes de Refacciones'=>array('order/index'),
	'Administrar Refacciones Asignadas',
);

$this->menu=array(
	array('label'=>'Listar órdenes de refacción', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#spare-parts-order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Órdenes de Refacción</h1>

<p>
Si lo desea, puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de busqueda, para especificar como se debe realizar la comparación.
</p>

<?php 
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'spare-parts-order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enableSorting' => true,
	'columns'=>array(
		'id',
		'order_id',
		'spareParts.name',
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
        	'template'=>"{view}",
        	'deleteConfirmation' => '¿Está seguro que desea desactivar la refacción?',
        	'buttons' => array(
        		'activate'=>array(
        			'label'=>'Activar',
                	'url'=>'Yii::app()->createUrl("sparePartsOrder/activate", array("id"=>$data->id))',
                	'imageUrl'=>Yii::app()->request->baseUrl.'/images/active.png',
                	//'visible'=>'$data->active == 0',
                	'click'=>'function(){
                		return confirm(\'¿Esta seguro que desea activar la refacción?\');
                    	}',
            	),                            
            	'delete'=>array(
            		'label'=>'Desactivar',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/deactive.png',
            		//'visible'=>'$data->active == 1',
            	),
        	),
		),
	),
)); ?>

<?php Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
	$('.change-pageSize').live('change',function(){
		$.fn.yiiGridView.update('spare-parts-order-grid',{ data:{ pageSize: $(this).val() }} ) 
		});
EOD
	,CClientScript::POS_READY);?>