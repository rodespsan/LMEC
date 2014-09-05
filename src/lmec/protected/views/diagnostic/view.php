<?php
/* @var $this DiagnosticController */
/* @var $model Diagnostic */

$this->breadcrumbs = array(
    'Diagnóstico' => array('index'),
    $Folio = $model->order->Folio,
);

$this->menu = array(
    array('label' => 'Listar Diagnósticos', 'url' => array('index')),
    array('label' => 'Actualizar Diagnóstico', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Eliminar Diagnóstico', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Administrar Diagnósticos', 'url' => array('admin')),
);
?>

<h1>Diagnóstico:<?php echo $Folio ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'name' => 'order_id',
            'value' => $Folio,
        ),
        array(
            'name' => 'user_id',
            'value' => $model->user->name,
        ),
        array(
            'name' => 'service_type_id',
            'value' => $model->serviceType->name,
        ),
        'date_hour',
        'observation',
        array(
            'label' => 'Finalizado',
            'type' => 'raw',
            'value' => ($model->finished == 1) ? 'Si' : 'No'
        ),
        array(
            'label' => 'Requiere refacción',
            'type' => 'raw',
            'value' => ($model->refection == 1) ? 'Si' : 'No'
        ),
        array(
            'label' => 'Trabajos',
            'type' => 'raw',
            'value' => $model->getWorks($model->id),
        ),
    ),
));
?>


