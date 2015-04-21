<?php
/* @var $this BlogGuaranteeController */
/* @var $model BlogGuarantee */

$this->breadcrumbs = array(
    'Bitácora de Garantía' => array('index'),
  $order =  $model->order->Folio,
);

$this->menu = array(
    array('label' => 'Listar Bitácora de Garantía', 'url' => array('index', 'id' => $model->order_id)),
//	array('label'=>'Create BlogGuarantee', 'url'=>array('create')),
    array('label' => 'Actualizar Bitácora de Garantía', 'url' => array('update', 'id' => $model->order_id)),
    array('label' => 'Desactivar Bitácora de Garantía', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => '¿Esta seguro que desea desactivar esta bitácora?'), 'visible' => $model->active == 1),
    array('label' => 'Activar Bitácora de Garantía', 'url' => '#', 'linkOptions' => array('submit' => array('activate', 'id' => $model->id), 'confirm' => '¿Esta seguro que desea activar esta bitácora?'), 'visible' => $model->active == 0),
    array('label' => 'Administrar Bitácora de Garantía', 'url' => array('admin')),
);
?>

<h1>Bitácora de Garantía: <?php echo $order ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
//		'id',
        array(
            'name' => 'order_id',
            'value' => $order,
        ),
        array(
            'name' => 'activity_guarantee_id',
            'value' => $model->activityGuarantee->description,
        ),
        array(
            'name' => 'technician_user_id',
            'value' => $model->technicianUser->name,
        ),
        'date_hour',
        'observation',
        array(
            'name' => 'active',
            'value' => BlogGuarantee::getActive($model->active),
        ),
    ),
));
?>
