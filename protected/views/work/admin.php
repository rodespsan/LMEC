<?php
/* @var $this WorkController */
/* @var $model Work */

$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Trabajos', 'url'=>array('index')),
	array('label'=>'Crear Trabajo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#work-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Trabajos</h1>

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
	'id'=>'work-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enableSorting' => true,
	'columns'=>array(
		'id',
		//'service_type_id',
		'name',
		/*array(
			'name' => 'name',
			'value' =>  '$data->name',
			
			
		),*/
		array(
			'header' => 'Tipo Servicio',
			'name' => 'serviceType.name',
			'filter' => CHtml::activeTextField($model->serviceType,'name'),
			
		),
		//'description',
		//'active',
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
                array(10=>10,20=>20, 30 =>30, 40 => 40,50=>50),
                array('prompt'=>'Paginacion','onchange'=>"$.fn.yiiGridView.update('work-grid',{ data:{ pageSize: $(this).val() }})",)
						),
			'template' => '{update}{view}{delete}{activate}',
			'deleteConfirmation'=> '¿Está seguro que desea desactivar el trabajo?',
			'buttons' =>array(
					'update' =>array(
						'options' =>array('title'=> 'Actualizar'),
					),
					'delete' =>array(
						'options' =>array('title'=> 'Desactivar'), 
						'url'=>'Yii::app()->createUrl("brand/deactive", array("id"=>$data->id))',
						'imageUrl'=> Yii::app()->request->baseUrl.'/images/deactive.png',
						'visible'=>'$data->active == 1',
						
						
					),
					'activate'=>array(
						'label'=>'Activar',
						'url'=>'Yii::app()->createUrl("work/activate", array("id"=>$data->id))',
						'imageUrl'=> Yii::app()->request->baseUrl.'/images/active.png',
						'visible'=>'$data->active == 0',
						'click'=>'function()
						{
							return confirm(\'¿Está seguro que desea activar este Trabajo?\');
						
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

