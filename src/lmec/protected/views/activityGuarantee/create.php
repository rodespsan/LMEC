<?php
/* @var $this ActivityGuaranteeController */
/* @var $model ActivityGuarantee */

$this->breadcrumbs=array(
	'Actividad de Garantía'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Actividades de Garantía', 'url'=>array('index')),
	array('label'=>'Administrar Actividades de Garantía', 'url'=>array('admin')),
);
?>

<h1>Actividad de Garantía</h1>

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

<?php $this->renderPartial('_form', array('model'=>$model)); ?>