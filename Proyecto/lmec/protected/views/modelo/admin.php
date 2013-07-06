<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar modelos', 'url'=>array('index')),
	array('label'=>'Crear modelos', 'url'=>array('create')),
);

?>

<h1>Administrar modelos</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de busqueda, para especificar como se debe realizar la comparaci&oacute;n
</p>

<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'modelo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
		'name'=>'equipment_type_id',
		'value'=>'$data->EquipmentType->type',
		),array(
		'name'=>'brand_id',
		'value'=>'$data->Brand->name',
		),
		'name',
		array(
			'name' => 'active',
			'value'=>'Modelo::getActive($data->active)',
			'filter' => array('1'=>'Si','0'=>'No'),
			),
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList(
                'pageSize',
                $pageSize,
                array(10=>10,20=>20,30=>30,40=>40,50=>50),
                array(
					'prompt'=>'Paginacion',
					'onchange'=>"$.fn.yiiGridView.update('modelo-grid',{ data:{ pageSize: $(this).val() }})",
				)
            ),
			'template'=>'{update}{view}{delete}{activate}',
			'deleteConfirmation'=> '¿Está seguro que desea desactivar el modelo?',

			'buttons' => array(

				'activate'=>array(
					'label'=>'Activar',
                    'url'=>'Yii::app()->createUrl("modelo/activate", array("id"=>$data->id))',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/active.png',
					'click'=>"function(){
								if(!confirm('¿Seguro que desea activar este elemento?')){ 
									return false;
								}
								$.fn.yiiGridView.update('modelo-grid',{
									type:'POST',
									url:$(this).attr('href'),
									success:function(data){
										$.fn.yiiGridView.update('modelo-grid');
									},
									});
									return false;
							}",
					'visible'=>'$data->active == 0',
				),
				'delete'=>array(
					'label'=>'Desactivar',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/deactive.png',
					'visible'=>'$data->active == 1',
				),
			),
		),
	),
)); ?>
