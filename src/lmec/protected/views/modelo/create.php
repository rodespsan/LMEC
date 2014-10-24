<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar modelos', 'url'=>array('index')),
	array('label'=>'Administrar modelo', 'url'=>array('admin')),
);
?>

<h1>Crear modelo</h1>

<?php if( Yii::app()->user->hasFlash('modelo-created') ): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('modelo-created'); ?>
</div>
<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
