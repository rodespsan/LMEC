<?php
/* @var $this RepairController */
/* @var $model Repair */

$this->breadcrumbs=array(
	'Reparaciones'=>array('index'),
	$model->order->getFolio() =>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Reparaciones', 'url'=>array('index')),
	array('label'=>'Ver Reparación', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Reparaciones', 'url'=>array('admin')),
);
?>

<h1>Reparación <?php //echo $model->id; ?></h1>

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

<?php $this->renderPartial('_formUpdate', array('model'=>$model,'modelRepairWork'=>$modelRepairWork,'modelOrder'=>$modelOrder)); ?>