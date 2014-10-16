<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Crear cliente',
);

$this->menu=array(
	array('label'=>'Listar clientes', 'url'=>array('index')),
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
);
?>

<h1>Crear cliente</h1>

<?php if( Yii::app()->user->hasFlash('customer-created') ): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('customer-created'); ?>
</div>
<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>