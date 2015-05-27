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

<h1>Crear actividad de garantía</h1>

<?php if( Yii::app()->user->hasFlash('activityGuarantee-created') ): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('activityGuarantee-created'); ?>
</div>
<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>