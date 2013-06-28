<?php
/* @var $this SparePartsController */
/* @var $model SpareParts */

$this->breadcrumbs=array(
	'Refacciones'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar refacciones', 'url'=>array('index')),
	array('label'=>'Crear refacción', 'url'=>array('create')),
	array('label'=>'Listar estados de refacción', 'url'=>array('sparePartsStatus/index')),
	array('label'=>'Crear estado de refacción', 'url'=>array('sparePartsStatus/create')),
	array('label'=>'Administrar estados de refacción', 'url'=>array('sparePartsStatus/admin')),
);

?>

<h1>Administrar Refacciones</h1>

<p>
Si lo desea, puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de busqueda, para especificar como se debe realizar la comparación
</p>



<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'spare-parts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enableSorting' => true,
	'columns'=>array(
		'id',
		//'brand_id',
		array(
			'name' => 'brand_id',
			'value' => '$data->brand->name',				
			'filter' => CHtml::activeTextField($model->brand,'name'),
			
		),
		//'spare_parts_status_id',
		array(
			'name' => 'spare_parts_status_id',
			'value' =>  '$data->sparePartsStatus->description',
			'filter' => CHtml::activeTextField($model->sparePartsStatus,'description'),
			
		),
		//'provider_id',
		array(
			'name' => 'provider_id',
			'value' =>  '$data->provider->name',
			'filter' => CHtml::activeTextField($model->provider,'name'),
			
		),
		'name',
		'serial_number',
		//'active',
		array(
			'name' => 'active',
			'value' =>  '$data->getActiveText()',
			'filter' => array('1'=>'Si','0'=>'No'),
			
		),
		/*
		'price',
		'date_hour',
		'guarantee_period',
		'invoice',
		'description',
		
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList(
				'pageSize',
                $pageSize,
                array(10=>10,20=>20, 30=>30, 40=>40, 50=>50),
                array('prompt'=>'Paginacion','onchange'=>"$.fn.yiiGridView.update('spare-parts-grid',{ data:{ pageSize: $(this).val() }})",)
						),
			'template' => '{update}{view}{delete}{activate}',
			'deleteConfirmation'=> '¿Está seguro que desea desactivar la refacción?',
			'buttons' =>array(
					'update' =>array(
						'options' =>array('title'=> 'Actualizar'),
					),
					'delete' =>array(
						'label' => 'Desactivar',
						//'options' =>array('title'=> 'Desactivar'), 
						//'url'=>'Yii::app()->createUrl("brand/deactive", array("id"=>$data->id))',
						'imageUrl'=> Yii::app()->request->baseUrl.'/images/deactive.png',
						'visible'=>'$data->active == 1',						
					),
					'activate'=>array(
						'label'=>'Activar',
						'url'=>'Yii::app()->createUrl("spareParts/activate", array("id"=>$data->id))',
						'imageUrl'=> Yii::app()->request->baseUrl.'/images/active.png',
						'visible'=>'$data->active == 0',
						'click'=>'function()
						{
							return confirm(\'¿Esta seguro que desea activar esta refacción?\');
						
						}',
					),
			),
		),
	),
)); ?>
<?php Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
	$('.change-pageSize').live('change',function(){
		$.fn.yiiGridView.update('user-grid',{ data:{ pageSize: $(this).val() }} ) 
		});
EOD
	,CClientScript::POS_READY);?>

