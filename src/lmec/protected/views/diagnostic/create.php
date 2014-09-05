<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Diagnóstico'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Diagnóstico', 'url'=>array('index')),
	array('label'=>'Administar Diagnóstico', 'url'=>array('admin')),
);
?>

<h1>Diagnóstico </h1>

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
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDiagnosticWork'=>$modelDiagnosticWork,'modelOrder'=>$modelOrder)); ?>