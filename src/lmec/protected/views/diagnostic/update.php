<?php
/* @var $this DiagnosticController */
/* @var $model Diagnostic */

$this->breadcrumbs=array(
	'Diagnóstico'=>array('index'),
	$model->order->Folio=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Diagnósticos', 'url'=>array('index')),
	array('label'=>'Ver Diagnóstico', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Diagnósticos', 'url'=>array('admin')),
);
?>

<h1> Diagnóstico</h1>

<?php

$flashMessages = Yii::app()->user->getFlashes();
if ($flashMessages) {
    echo '<ul class="flashes" style="text-align: left; ">';
    foreach ($flashMessages as $key => $message) {
        echo '<li style="list-style:none;"><b><div class="flash-' . $key . '">' . $message . "</div><b></li>\n";
    }
    echo '</ul>';
}
?>

<?php $this->renderPartial('_formUpdate', array('model'=>$model,'modelDiagnosticWork'=>$modelDiagnosticWork,'modelOrder'=>$modelOrder)); ?>