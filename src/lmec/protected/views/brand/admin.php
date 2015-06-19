<?php
/* @var $this BrandController */
/* @var $model Brand */
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/filterFocus.js", CClientScript::POS_END);

$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar marcas', 'url'=>array('index')),
	array('label'=>'Crear marca', 'url'=>array('create')),
);

?>

<h1>Administrar marcas</h1>

<p>
Si lo desea, puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de busqueda, para especificar como se debe realizar la comparación
</p>


<?php 
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'brand-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enableSorting' => true,
	'afterAjaxUpdate'=>'afterAjaxUpdate',
	'columns'=>array(
		'id' ,
		'name' ,
		//'active',
		array(
			'name' => 'active',
			'value' =>  '($data->active=="1")?"Si":"No"',
			'filter' => array('1'=>'Si','0'=>'No'),
			
		),
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList(
			'pageSize',
                $pageSize,
                array(10=>10,20=>20,30=>30,40=>40,50=>50,100=>100),
                array(
					'prompt'=>'Paginacion',
					'onchange'=>"$.fn.yiiGridView.update('brand-grid',{ data:{ pageSize: $(this).val() }})",
					)
			),
			
			
			'template' => '{update}{view}{delete}{activate}',
			'deleteConfirmation'=> '¿Está seguro que desea desactivar la marca?',
			'buttons' =>array(
					'update' =>array(
						'options' =>array('title'=> 'Actualizar'),
					),
					
					'activate'=>array(
						'label'=>'Activar',
						'url'=>'Yii::app()->createUrl("brand/activate", array("id"=>$data->id))',
						'imageUrl'=> Yii::app()->request->baseUrl.'/images/active.png',
						'visible'=>'$data->active == 0',
						'click'=>"function(){
								if(!confirm('¿Seguro que desea activar este elemento?')){ 
									return false;
								}
								$.fn.yiiGridView.update('brand-grid',{
									type:'POST',
									url:$(this).attr('href'),
									success:function(data){
										$.fn.yiiGridView.update('brand-grid');
									},
									});
									return false;
							}",
					),
					
					'delete' =>array(
						'label'=>'Desactivar',
						'imageUrl'=>Yii::app()->request->baseUrl.'/images/deactive.png',
						'visible'=>'$data->active == 1',
						
						
					),
			),
		),
	),
)); ?>
