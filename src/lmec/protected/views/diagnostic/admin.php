<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/filterFocus.js", CClientScript::POS_END);
/* @var $this DiagnosticController */
/* @var $model Diagnostic */

$this->breadcrumbs=array(
	'Diagnóstico'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Diagnósticos', 'url'=>array('index')),
	//array('label'=>'Crear Diagnostico', 'url'=>array('create')),
);

/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#diagnostic-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>

<h1>Administrar Diagnósticos</h1>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada uno de los valores de busqueda para especificar cómo se debe hacer la comparación.
</p>
<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'diagnostic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'afterAjaxUpdate'=>'afterAjaxUpdate',
	'columns'=>array(
		array(
		 'name'=>'order_id',
		 'value'=>'Order::model()->getFolio_($data->order_id)',
		),
		array(
		 'name'=>'user_id',
		 'value'=>'$data->user->name',
		),
		array(
		 'name'=>'service_type_id',
		 'value'=>'$data->serviceType->name',
		),
		'date_hour',
		'observation',
		array(
		  'class'=>'CButtonColumn',
		  'header'=>CHtml::dropDownList(
		         'pageSize',
		         $pageSize,array(10=>10,20=>20,30=>30,40=>40,50=>50),
                 array(
				  'prompt'=>'Paginación',
				  'onchange'=>"$.fn.yiiGridView.update('diagnostic-grid',{ data:{ pageSize: $(this).val() }})",
		        )
		   ),
		   'template'=>'{view}{delete}{update}',
		   'buttons'=>array(
		       'update'=>array(
			        'url'=>'Yii::app()->createUrl("/diagnostic/update",array("id"=>$data->id))',
			     )
		   
		   ),	
		),
	),
)); ?>
