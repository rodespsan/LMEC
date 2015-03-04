<?php
/* @var $this SparePartsTypeController */
/* @var $model SparePartsType */

$this->breadcrumbs=array(
	'Tipo de Refacciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Refacción', 'url'=>array('index')),
	array('label'=>'Administrar Tipos de Refacción', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de Refacción</h1>

<?php if( Yii::app()->user->hasFlash('sparepartstype-created') ): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('sparepartstype-created'); ?>
</div>
<?php endif; ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>