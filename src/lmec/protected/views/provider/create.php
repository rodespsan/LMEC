<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Crear proveedor',
);

$this->menu=array(
	array('label'=>'Listar proveedores', 'url'=>array('index')),
	array('label'=>'Administrar proveedores', 'url'=>array('admin')),
);
?>

<h1>Crear proveedor</h1>

<?php if( Yii::app()->user->hasFlash('provider-created') ): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('provider-created'); ?>
</div>
<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>