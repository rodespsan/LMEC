<?php
/* @var $this SparePartsOrderController */
/* @var $model SparePartsOrder */

$this->breadcrumbs=array(
	'Órdenes de Refacciones'=>array('order/index'),
	'Administrar Refacciones Asignadas',
);

$this->menu=array(
	array('label'=>'Listar Órdenes de Refacción', 'url'=>array('index')),
	array('label'=>'Crear Orden de Refacción', 'url'=>array('/order/index')),
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

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'spare-parts-order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'order_id',
		//'spare_parts_type_id',
		'spare_parts_id',
		array(
			'class'=>'CButtonColumn',
        	'template'=>"{update}{view}{delete}{activate}",
        	'deleteConfirmation' => '¿Está seguro que desea desactivar la refacción?',
        	'buttons' => array(
        		'activate'=>array(
        			'label'=>'Activar',
                	'url'=>'Yii::app()->createUrl("sparePartsOrder/activate", array("id"=>$data->id))',
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
	),
)); ?>
