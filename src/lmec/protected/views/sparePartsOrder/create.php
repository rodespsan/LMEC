<?php
/* @var $this SparePartsOrderController */
/* @var $model SparePartsOrder */

$this->breadcrumbs=array(
	'Orden de Refacciones'=>array('/order/index'),
	'Asignar Refacciones',
);

$this->menu=array(
	array('label'=>'Listar Órdenes de Refacción', 'url'=>array('index')),
	array('label'=>'Administrar Órdenes de Refacción', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('customer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>Asignar Refacciones a la Orden <?php echo(str_pad($modelOrder->id, 5, "0", STR_PAD_LEFT))?></h1>

<p>
Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    o <b>=</b>) al comienzo de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer.
</p>

<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
?>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'spare-parts-grid',
	'dataProvider'=>new CActiveDataProvider('SpareParts',array(
		'criteria'=>array(
			'condition'=>'active = 1 AND assigned = 0',
		)
	)),
	'filter'=>new SpareParts('search'),
	'enableSorting' => true,
	'columns'=>array(
		'id',
		array(
			'name' => 'spare_parts_status_id',
	 		//'value' =>  '$data->sparePartsStatus->description',
	 		'value' => 'CHtml::link($data->sparePartsStatus->description,array("sparePartsStatus/view","id"=>$data->sparePartsStatus->id))',
			'type'=>'html',
	 		// 'filter' => CHtml::activeTextField($model->sparePartsStatus,'description'),
		),
		array(
			'name' => 'spare_parts_type_id',
			//'value' =>  '$data->sparePartsType->type',
			'value' => 'CHtml::link($data->sparePartsType->type,array("sparePartsType/view","id"=>$data->sparePartsType->id))',
			'type'=>'html',
			// 'filter' => CHtml::activeTextField($model->sparePartsType,'type'),
		),
		array(
			'name' => 'brand_id',
			//'value' => '$data->brand->name',
			'value' => 'CHtml::link($data->brand->name,array("brand/view","id"=>$data->brand->id))',
			'type'=>'html',
			//'filter' => CHtml::activeTextField($model->brand,'name'),
			
		),
		array(
			'name' => 'provider_id',
			//'value' =>  '$data->provider->name',
			'value' => 'CHtml::link($data->provider->name,array("provider/view","id"=>$data->provider->id))',
			'type'=>'html',
			//'filter' => CHtml::activeTextField($model->provider,'name'),
			
		),
		'name',
	 	'serial_number',
	 	'price',
		'date_hour',
		'guarantee_period',
		array(
			'name' => 'active',
			'value' =>  '$data->getActiveText()',
			'filter' => array('1'=>'Si','0'=>'No'),
		),
		array(
            'class'=>'CButtonColumn',
            'header'=>CHtml::dropDownList(
            	'pageSize',
            	$pageSize,
            	array(10=>10,20=>20,30=>30,40=>40,50=>50),
            	array('class'=>'change-pagesize')
         	),
        	'template'=>"{update}{view}{delete}{activate}",
        	'deleteConfirmation' => '¿Está seguro que desea desactivar la refacción?',
        	'buttons' => array(
        		'activate'=>array(
        			'label'=>'Activar',
                	'url'=>'Yii::app()->createUrl("spareParts/activate", array("id"=>$data->id))',
                	'imageUrl'=>Yii::app()->request->baseUrl.'/images/active.png',
                	'visible'=>'$data->active == 0',
                	'click'=>'function(){
                		return confirm(\'¿Esta seguro que desea activar la refacción?\');
                    	}',
            	),                            
            	'delete'=>array(
            		'label'=>'Desactivar',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/deactive.png',
            		'visible'=>'$data->active == 1',
            	),
        	),
    	),
    )
)); 
?>
<?php Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
    $('.change-pagesize').live('change', function() {
        $.fn.yiiGridView.update('spare-parts-grid',{ data:{ pageSize: $(this).val() }})
    });
EOD
,CClientScript::POS_READY); ?>