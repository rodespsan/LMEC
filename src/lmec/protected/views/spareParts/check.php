<?php
/* @var $this SparePartsController */
/* @var $model SpareParts */

$this->menu=array(
	array('label'=>'Asignar refacción', 'url'=>array('spareParts/assign','id'=>$modelOrder->id)),
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

<h1>Refacciones asignadas a la Orden <?php echo(str_pad($modelOrder->id, 5, "0", STR_PAD_LEFT))?></h1>

<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'spare-parts-assigned-grid',
	'dataProvider'=>new CActiveDataProvider('SparePartsOrder',array(
		'criteria'=>array(
			'condition' => 'order_id = :order_id',
			'params' => array(
				':order_id' => $modelOrder->id
			),
		)
	)),
	'enableSorting' => true, //QUE HACE??? NO ESTA EN LOS OTROS :S
	'columns'=>array(
		'spare_parts_id',
		'spareParts.name',
		'spareParts.serial_number',
		'spareParts.price',
		'spareParts.description',
		array(
            'class'=>'CButtonColumn',
            'header'=>CHtml::dropDownList(
            	'pageSize',
            	$pageSize,
            	array(10=>10,20=>20,30=>30,40=>40,50=>50),
            	array('class'=>'change-pagesize')
         	),
        	'template'=>"{update}{view}{quite}",
        	'buttons' => array(
        		'quite'=>array(
        			'label'=>'Quitar',
					'url'=>'Yii::app()->createUrl("spareParts/remove", array("spare_parts_id"=>$data->spare_parts_id,"order_id"=>'.$modelOrder->id.'))',
                	'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                	//'visible'=>'$data->assigned == 0',
                	'click'=>'function(){
                		return confirm(\'¿Está seguro que desea quitar la refacción a esta orden?\');
                    	}',
            	),
        	),
    	),
    )
)); 
?>
<?php Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
    $('.change-pagesize').live('change', function() {
        $.fn.yiiGridView.update('spare-parts-grid',{ data:{ pageSize: $(this).val() }})
    });
EOD
,CClientScript::POS_READY); ?>