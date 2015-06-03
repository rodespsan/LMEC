<?php
/* @var $this WorkController */
/* @var $model Work */

$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar trabajos', 'url'=>array('index')),
	array('label'=>'Administrar trabajos', 'url'=>array('admin')),
);
?>

<h1>Crear trabajos</h1>

<?php if( Yii::app()->user->hasFlash('work-created') ): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('work-created'); ?>
</div>
<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>