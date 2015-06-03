<?php
$this->breadcrumbs=array(
	'Tipos de cliente'=>array('index'),
	'Crear tipo de cliente',
);

$this->menu=array(
	array('label'=>'Listar tipos de cliente', 'url'=>array('index')),
	array('label'=>'Administrar tipos de cliente', 'url'=>array('admin')),
);
?>

<h1>Crear tipo de cliente</h1>

<?php if( Yii::app()->user->hasFlash('customerType-created') ): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('customerType-created'); ?>
</div>
<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>