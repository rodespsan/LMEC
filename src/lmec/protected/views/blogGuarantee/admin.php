<?php
/* @var $this BlogGuaranteeController */
/* @var $model BlogGuarantee */

$this->breadcrumbs=array(
	'Bitácora de Garantía'=>array('index'),
	'Administrar',
);

/*$this->menu=array(
	array('label'=>'Listar Bitácoras de Garantías', 'url'=>array('index')),
	//array('label'=>'Create BlogGuarantee', 'url'=>array('create')),
);*/

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#blog-guarantee-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<h1>Administrar Bitácoras de Garantías</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de b&uacute;squeda, para especificar como se debe realizar la comparaci&oacute;n.
</p>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">-->
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
<!--</div> search-form -->


<?php 
	$pageSizeActivity=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);         
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'blog-guarantee-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
                    'name'=>'order_id',
                    'value' => '$data->order->Folio',
                ),
		array(
			'name' => 'activity_guarantee_id',
			'value' => '$data->activityGuarantee->description',
		),
		array(
			'name' => 'technician_user_id',
			'value' => '$data->technicianUser->user',
		),
		'date_hour',
        'observation',
        array(
			'name' => 'active',
			'value'=>'BlogGuarantee::getActive($data->active)',
			'filter' => array('1'=>'Si','0'=>'No'),
			),
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList(
                'pageSize',
                $pageSizeActivity,
                array(10=>10,20=>20,30=>30,40=>40,50=>50),
                array(
					'prompt'=>'Paginación',
					'onchange'=>"$.fn.yiiGridView.update('blog-guarantee-grid',{ data:{ pageSize: $(this).val() }})",
				)
                                
            ),
			'template'=>'{update}{view}{delete}{activate}',
			'deleteConfirmation'=> '¿Está seguro que desea desactivar esta bitácora?',

			'buttons' => array(
				
				'activate'=>array(
					'label'=>'Activar',
                    'url'=>'Yii::app()->createUrl("BlogGuarantee/activate", array("id"=>$data->id))',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/active.png',
					'click'=>"function(){
								if(!confirm('¿Esta seguro que desea activar esta bitácora?')){ 
									return false;
								}
								$.fn.yiiGridView.update('blog-guarantee-grid',{
									type:'POST',
									url:$(this).attr('href'),
									success:function(data){
										$.fn.yiiGridView.update('blog-guarantee-grid');
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
				'update'=>array(
					'url'=>'Yii::app()->createUrl("BlogGuarantee/update", array("id"=>$data->order_id))',
				),
			),
		),
	),
)); ?>
