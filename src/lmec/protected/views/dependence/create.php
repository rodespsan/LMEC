<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	'Crear dependencia',
);

$this->menu=array(
	array('label'=>'Listar dependencias', 'url'=>array('index')),
	array('label'=>'Administrar dependencias', 'url'=>array('admin')),
);
?>

<h1>Crear dependencia</h1>

<?php if( Yii::app()->user->hasFlash('dependence-created') ): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('dependence-created'); ?>
</div>
<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>