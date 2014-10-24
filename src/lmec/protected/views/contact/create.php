<?php
$this->breadcrumbs=array(
	'Contactos'=>array('index'),
	'Crear contacto',
);

$this->menu=array(
	array('label'=>'Listar contactos', 'url'=>array('index')),
	array('label'=>'Administrar contactos', 'url'=>array('admin')),
);

if( isset($_GET['customer_id']) )
{
	array_push($this->menu,
		array('label'=>'Regresar al cliente', 'url'=>array('customer/view', 'id'=>$_GET['customer_id']))
	);
}
?>

<h1>Crear contacto</h1>

<?php if( Yii::app()->user->hasFlash('contact-created') ): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact-created'); ?>
</div>
<?php endif; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>