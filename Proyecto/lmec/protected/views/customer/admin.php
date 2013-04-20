<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Administrar Cliente',
);

$this->menu=array(
	array('label'=>'Listar Cliente', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
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

<h1>Administrar Cliente</h1>

<p>
Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    o <b>=</b>) al comienzo de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer.
</p>

<?php /*?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php */?>

<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
                'name',
		//'customer_type_id',                
                //'customerType.type',
                array(
                        //'name'=>'customerType.type',
                        'name'=>'customer_type_id',
                        'value'=>'$data->customerType->type',
                ),
		//'contacts',
                array(
                        'type' => 'raw',
                        'name'=>'nombreContacto',
                        //'value'=>'$data->contacts[0]->name',
                        'value'=>'$data->getContacts($data->id)', 
                    
                ),
                //'contact.name',
		//'address',
		//'dependence_id',
                //'dependence.name',
                array(
                        'name'=>'dependence_id',
                        'value'=>'($data->dependence == null)?"Sin dependencia":$data->dependence->name',
                ),
		//'active',
                array(
                    'name' => 'active',
                    'value'=>'($data->active == 1)? \'Si\': \'No\'',
                    'filter' => array('1'=>'Si','0'=>'No'),
                ),
                array(
                    'class'=>'CButtonColumn',
                    'header'=>CHtml::dropDownList('pageSize',$pageSize,array(10=>10,20=>20,30=>30,40=>40,50=>50),array('class'=>'change-pagesize')),
                    'template'=>"{update}{view}{delete}{activate}",
                    'deleteConfirmation' => '¿Esta seguro que desea desactivar este Cliente?',
                    'buttons' => array(

                            'activate'=>array(
                                    'label'=>'Activar',
                                    'url'=>'Yii::app()->createUrl("customer/activate", array("id"=>$data->id))',
                                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/active.png',
                                    'visible'=>'$data->active == 0',
                                    'click'=>'function()
                                                    {
                                                            return confirm(\'¿Esta seguro que desea activar esta Cliente?\');
                                                    }',
                            ),                            
                            'delete'=>array(
                                    'visible'=>'$data->active == 1',
                                    'label'=>'Desactivar',
                                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/deactive.png',
                            ),
                    ),
                ),
                
                
	),
)); ?>

<?php Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
    $('.change-pagesize').live('change', function() {
        $.fn.yiiGridView.update('customer-grid',{ data:{ pageSize: $(this).val() }})
    });
EOD
,CClientScript::POS_READY); ?>