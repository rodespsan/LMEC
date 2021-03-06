<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/filterFocus.js", CClientScript::POS_END);
/* @var $this ServiceTypeController */
/* @var $model ServiceType */

$this->breadcrumbs=array(
	'Tipos de servicio'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar tipos de servicio', 'url'=>array('index')),
	array('label'=>'Crear tipo de servicio', 'url'=>array('create')),
);
?>

<h1>Administrar tipos de servicio</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de busqueda, para especificar como se debe realizar la comparaci&oacute;n.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'afterAjaxUpdate'=>'afterAjaxUpdate',
	'columns'=>array(
		'id',
		'name',
		array(
			'name'=>'active',
			'value'=>'Service::getActive($data->active)',
			'filter'=>array('1'=>'Si', '0'=>'No'),
			 ),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}{delete}{activate}',
			'buttons' => array(
				'activate'=>array(
					'label'=>'Activar',
                    'url'=>'Yii::app()->createUrl("servicetype/activate", array("id"=>$data->id))',
                    'imageUrl'=> Yii::app()->request->baseUrl . '/images/active.png',
					'visible'=>'$data->active == 0',
					'click'=> "function(){
								if(!confirm('¿Seguro que desea activar este elemento?')) return false;
								$.fn.yiiGridView.update('service-type-grid',{
									type:'POST',
									url:$(this).attr('href'),
									success:function(data){
										$.fn.yiiGridView.update('service-type-grid');
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
)); ?>