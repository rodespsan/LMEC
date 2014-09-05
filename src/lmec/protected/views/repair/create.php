<?php
/* @var $this RepairController */
/* @var $model Repair */

$this->breadcrumbs=array(
	'Reparaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Reparaciones', 'url'=>array('index')),
	array('label'=>'Administrar Reparaciones', 'url'=>array('admin')),
);
?>

<?php

?>

<h1>Reparación </h1>


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

<?php $this->renderPartial('_form', array('model'=>$model, 'modelRepairWork'=>$modelRepairWork)); ?>