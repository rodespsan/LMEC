<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/filterFocus.js", CClientScript::POS_END);
$this->breadcrumbs = array(
    'Dependencias' => array('index'),
    'Administrar dependencias',
);

$this->menu = array(
    array('label' => 'Listar dependencias', 'url' => array('index')),
    array('label' => 'Crear dependencia', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('dependence-grid', {
		data: $(this).serialize()
	});
	return false;
});

");
?>

<h1>Administrar dependencias</h1>

<p>
    Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    o <b>=</b>) al comienzo de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer.
</p>


<?php
$pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'dependence-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate'=>'afterAjaxUpdate',
    'columns' => array(
        'id',
        array(
            'name'=>'name',
            'value'=>'CHtml::link($data->name,array("view","id"=>$data->id))',
            'type'=>'html',
        ),
        'telephone_number',
        'extension',
        array(
            'name' => 'active',
            'value' => 'Dependence::getActive($data->active)',
            'filter' => array('1' => 'Si', '0' => 'No'),
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => CHtml::dropDownList('pageSize', $pageSize, array(10 => 10, 20 => 20, 30 => 30, 40 => 40, 50 => 50), array('class' => 'change-pagesize')),
            'template' => "{update}{view}{delete}{activate}",
            'deleteConfirmation' => '¿Esta seguro que desea desactivar esta Dependencia?',
            'buttons' => array(
                'activate' => array(
                    'label' => 'Activar',
                    'url' => 'Yii::app()->createUrl("dependence/activate", array("id"=>$data->id))',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/active.png',
                    'visible' => '$data->active == 0',
                    'click' => 'function()
                                        {
                                        return confirm(\'¿Esta seguro que desea activar esta Dependencia?\');
                                        }',
                ),
                'delete' => array(
                    'visible' => '$data->active == 1',
                    'label' => 'Desactivar',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/deactive.png',
                ),
            ),
        )
    ),
));
?>
<?php Yii::app()->clientScript->registerScript('initPageSize', <<<EOD
    $('.change-pagesize').live('change', function() {
        $.fn.yiiGridView.update('dependence-grid',{ data:{ pageSize: $(this).val() }})
    });
EOD
        , CClientScript::POS_READY);
?>