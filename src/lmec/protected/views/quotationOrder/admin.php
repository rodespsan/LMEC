<?php
/* @var $this QuotationOrderController */
/* @var $model QuotationOrder */

$this->breadcrumbs=array(
	'Cotización'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Cotizaciones', 'url'=>array('index')),
//	array('label'=>'Create QuotationOrder', 'url'=>array('create')),
);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#quotation-order-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<h1>Administrar Cotizaciones</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n  (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de b&uacute;squeda, para especificar como se debe realizar la comparaci&oacute;n.
</p>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">-->
<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
<!--</div> search-form -->

<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);         
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'quotation-order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
                    'name'=>'order_id',
                    'value' => '$data->order->Folio',
                ),
		array(
                    'name' => 'quotation_text',
                    'type' => 'html'
                ),
		'total_price',
		'data_hour',
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList(
                'pageSize',
                $pageSize,
                array(10=>10,20=>20,30=>30,40=>40,50=>50),
                array(
					'prompt'=>'Paginación',
					'onchange'=>"$.fn.yiiGridView.update('quotation-order-grid',{ data:{ pageSize: $(this).val() }})",
				)
                                
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
//			
		),
	),
)); ?>
