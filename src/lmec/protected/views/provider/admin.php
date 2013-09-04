<?php
$this->breadcrumbs = array(
    'Proveedores' => array('index'),
    'Administrar proveedores',
);

$this->menu = array(
    array('label' => 'Listar proveedores', 'url' => array('index')),
    array('label' => 'Crear proveedor', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('provider-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar proveedor</h1>

<p>
    Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    o <b>=</b>) al comienzo de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer.
</p>



<?php
$pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'provider-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'enableSorting' => true,
    'columns' => array(
        'id',
        'name',
        'contact_name',
        'contact_email',
        'contact_telephone_number',
       
        array(
            'name' => 'active',
            'value' => 'Provider::getActive($data->active)',
            'filter' => array('1' => 'Si', '0' => 'No'),
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => CHtml::dropDownList(
                    'pageSize', $pageSize, array(10 => 10, 20 => 20, 30 => 30, 40 => 40, 50 => 50,), array('onchange' => "$.fn.yiiGridView.update('provider-grid',{data:{ pageSize: $(this).val() }})",)
            ),
            'template' => '{update}{view}{delete}{activate}',
            'deleteConfirmation' => '¿Está seguro que desea desactivar el Proveedor?',
            'buttons' => array(
                'update' => array(
                    'options' => array('title' => 'Actualizar'),
                ),
                'delete' => array(
                    'visible' => '$data->active == 1',
                    'label' => 'Desactivar',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/deactive.png',
                ),
                'activate' => array(
                    'label' => 'Activar',
                    'url' => 'Yii::app()->createUrl("provider/activate", array("id"=>$data->id))',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/active.png',
                    'visible' => '$data->active == 0',
                    'click' => 'function()
						{
							return confirm(\'¿Está seguro que desea activar este Proveedor?\');
						
						}',
                ),
            ),
        ),
    ),
));
?>
<?php
Yii::app()->clientScript->registerScript('initPageSize', <<<EOD
    $('.change-pagesize').live('change', function() {        
        $.fn.yiiGridView.update('provider-grid',{data:{ pageSize: $(this).val() }})
    });
EOD
        , CClientScript::POS_READY);
?>