<?php
/* @var $this AccessoryController */
/* @var $model Accessory */

$this->breadcrumbs=array(
	'Accesorios'=>array('index'),
	'Administrar'
);

$this->menu=array(
	array('label'=>'Listar accesorios', 'url'=>array('index')),
	array('label'=>'Crear accesorio', 'url'=>array('create')),
);

?>

<h1>Administrar accesorios</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de b&uacute;squeda, para especificar como se debe realizar la comparaci&oacute;n
</p>

<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
	
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accessory-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
		'name' => 'active',
		'value' => 'Accessory::getActive($data->active)',
		'filter' => array('1'=>'Si','0'=>'No'),
		),
		array(
			'class' => 'CButtonColumn',
			'header'=>CHtml::dropDownList(
                'pageSize',
                $pageSize,
				array(10=>10,20=>20,30=>30,40=>40,50=>50),
                array(
						'prompt'=>'Paginación',
						'onchange'=>"$.fn.yiiGridView.update('accessory-grid',{ data:{ pageSize: $(this).val() }})",
					)
				),
			'template'=>'{update}{view}{delete}{activate}',
			'deleteConfirmation'=>'¿Desactivar accesorio?',
			'buttons' => array(

				'activate'=>array(
					'label'=>'Activar',
                    'url'=>'Yii::app()->createUrl("accessory/activate", array("id"=>$data->id))',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/active.png',
					'click'=>"function(){
								if(!confirm('¿Activar accesorio?')){
									return false;
								}
								$.fn.yiiGridView.update('accessory-grid',{
									type:'POST',
									url:$(this).attr('href'),
									success:function(data){
										$.fn.yiiGridView.update('accessory-grid');
									},
									});
									return false;
							}",
					'visible'=>'$data->active == 0',
				),
				 'delete' => array(
                    'visible' => '$data->active == 1',
                    'label' => 'Desactivar',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/deactive.png',
                ),
			),
		),
	),
)); ?>

<?php Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
	$('.change-pageSize').live('change',function(){
		$.fn.yiiGridView.update('role-grid',{ data:{ pageSize: $(this).val() }} ) 
		});
EOD
	,CClientScript::POS_READY);?>
