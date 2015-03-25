<?php
/* @var $this StatusOrderController */
/* @var $model StatusOrder */

$this->breadcrumbs=array(
	'Estados de la Orden'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Estados de la Orden', 'url'=>array('index')),
	array('label'=>'Crear Estado de la Orden', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#status-order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Estados de la Orden</h1>

<p>
Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'status-order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'status',
		'active',
		array(
			'class'=>'CButtonColumn',
			'template'=>"{update}{view}{delete}{activate}",
        	'deleteConfirmation' => '¿Está seguro que desea desactivar la refacción?',
        	'buttons' => array(
        		'activate'=>array(
        			'label'=>'Activar',
                	'url'=>'Yii::app()->createUrl("statusOrder/activate", array("id"=>$data->id))',
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
