<?php
/* @var $this RepairController */
/* @var $model Repair */

$this->breadcrumbs = array(
    'Reparaciones' => array('index'),
    'Administrar',
);

$this->menu = array(
    array('label' => 'Listar Reparaciones', 'url' => array('index')),
//	array('label'=>'Crear Reparación', 'url'=>array('create')),
);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#repair-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<h1>Administrar Reparaciones</h1>

<p>
    Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    o <b>=</b>) al principio de cada uno de los valores de b&uacute;squeda, para especificar como se debe realizar la comparaci&oacute;n.
</p>

<?php // echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">-->
<?php
//  $this->renderPartial('_search',array(
//	'model'=>$model,
//)); 
?>
<!--</div> search-form -->

<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
        
        ?>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'repair-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
//		'id',
        array(
            'name' => 'order_id',
            'value' => '$data->order->Folio',
        ),
        'description',
        array(
            'class' => 'CButtonColumn',
            'header' => CHtml::dropDownList(
                    'pageSize', $pageSize, array(10 => 10, 20 => 20, 30 => 30, 40 => 40, 50 => 50),
                    array(
                'prompt' => 'Paginación',
                'onchange' => "$.fn.yiiGridView.update('repair-grid',{ data:{ pageSize: $(this).val() }})",
                    )
            ),
            'template' => '{view}{delete}{update}',
            'buttons' => array(
                'update' => array(
                    'url' => 'Yii::app()->createUrl("/repair/update",array("id"=>$data->order_id))',
                )
            ),
        )
    ),
));
?>
