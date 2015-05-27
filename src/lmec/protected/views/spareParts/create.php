<?php
/* @var $this SparePartsController */
/* @var $model SpareParts */

$this->breadcrumbs=array(
	'Refacciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar refacciones', 'url'=>array('index')),
	array('label'=>'Administrar refacciones', 'url'=>array('admin')),
	array('label'=>'Listar estados de refacción', 'url'=>array('sparePartsStatus/index')),
	array('label'=>'Crear estado de refacción', 'url'=>array('sparePartsStatus/create')),
	array('label'=>'Listar tipos de refacción', 'url'=>array('sparePartsType/index')),
	array('label'=>'Crear tipo de refacción', 'url'=>array('sparePartsType/create')),
	array('label'=>'Administrar estados de refacción', 'url'=>array('sparePartsStatus/admin')),
	array('label'=>'Administrar tipos de refacción', 'url'=>array('sparePartsType/admin')),
);
?>

<h1>Crear refacción</h1>

<?php if( Yii::app()->user->hasFlash('spareparts-created') ): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('spareparts-created'); ?>
</div>
<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>