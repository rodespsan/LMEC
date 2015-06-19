<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/filterFocus.js", CClientScript::POS_END);
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar servicios', 'url'=>array('index')),
	array('label'=>'Crear servicio', 'url'=>array('create')),
);
?>

<h1>Administrar servicios</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de busqueda, para especificar como se debe realizar la comparaci&oacute;n.
</p>


<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'afterAjaxUpdate'=>'afterAjaxUpdate',
	'columns'=>array(
		'id',
		'code',
		array(
			'name'=>'service_type_id',
			'value'=>'$data->serviceType->name',
			'filter' => CHtml::activeTextField($model->serviceType,'name'),
			 ),
		'name',
		array(
			'name'=>'price',
			'value'=> '$data->price',
			 ),
		array(
			'name'=>'active',
			'value'=>'Service::getActive($data->active)',
			'filter'=>array('1'=>'Si', '0'=>'No'),
			 ),
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList('pageSize',$pageSize,array(10=>10,20=>20,30=>30,40=>40,50=>50),array(
			'onchange'=>"$.fn.yiiGridView.update('service-grid',{ data:{pageSize: $(this).val() }})",)),
			'template'=>'{update}{view}{delete}{activate}',
			'buttons' => array(
				'activate'=>array(
					'label'=>'Activar',
                    'url'=>'Yii::app()->createUrl("service/activate", array("id"=>$data->id))',
                    'imageUrl'=> Yii::app()->request->baseUrl . '/images/active.png',
					'visible'=>'$data->active == 0',
					'click'=> "function(){
								if(!confirm('¿Seguro que desea activar este elemento?')) return false;
								$.fn.yiiGridView.update('service-grid',{
									type:'POST',
									url:$(this).attr('href'),
									success:function(data){
										$.fn.yiiGridView.update('service-grid');
									},
									});
									return false;
							}",
				),
				'delete'=>array(
					'label'=>'Desactivar',
					'visible'=>'$data->active == 1',
					'imageUrl'=> Yii::app()->request->baseUrl . '/images/deactive.png',
				),
			),
		),
	),
)); 
?>