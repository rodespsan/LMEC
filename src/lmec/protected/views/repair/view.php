<?php
/* @var $this RepairController */
/* @var $model Repair */

$this->breadcrumbs=array(
	'Reparaciones'=>array('index'),
	$model->order->getFolio(),
);

$this->menu=array(
	array('label'=>'Listar Reparaciones', 'url'=>array('index')),
//	array('label'=>'Create Repair', 'url'=>array('create')),
	array('label'=>'Actualizar Reparación', 'url'=>array('update', 'id'=>$model->order_id)),
	array('label'=>'Eliminar Reparación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Reparaciones', 'url'=>array('admin')),
);
?>

<h1>Reparación: <?php echo $model->order->getFolio(); ?></h1>

<?php
$trabajosHtml = '<ul>';
foreach($model->repairWorks as $repairWork){
    
    $trabajosHtml .= '<li>'.$repairWork->work->name.'</li>';
    
}



$trabajosHtml .= '</ul>';

   

?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
		 array(
                'name'=>'order_id',
                'value'=> $model->order->getFolio(),
                ),
		'description', 
                array(
                    'name'=>'Trabajos',
                    'type'=> 'raw',
                    'value'=> $trabajosHtml,
                ),
	),
)); 





?>
