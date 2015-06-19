<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/filterFocus.js", CClientScript::POS_END);
/* @var $this SparePartsTypeController */
/* @var $model SparePartsType */

$this->breadcrumbs=array(
	'Tipos de Refacciones'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Refacción', 'url'=>array('index')),
	array('label'=>'Crear Tipos de Refacción', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#spare-parts-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Tipos de Refacción</h1>

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
	'id'=>'spare-parts-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'afterAjaxUpdate'=>'afterAjaxUpdate',
	'columns'=>array(
		'id',
		'type',
		'activeText',
		array(
			'class'=>'CButtonColumn',
        	'template'=>"{update}{view}{delete}{activate}",
        	'deleteConfirmation' => '¿Está seguro que desea desactivar el tipo de refacción?',
        	'buttons' => array(
        		'activate'=>array(
        			'label'=>'Activar',
                	'url'=>'Yii::app()->createUrl("sparePartsType/activate", array("id"=>$data->id))',
                	'imageUrl'=>Yii::app()->request->baseUrl.'/images/active.png',
                	'visible'=>'$data->active == 0',
                	'click'=>'function(){
                		return confirm(\'¿Esta seguro que desea activar el tipo de refacción?\');
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
