<?php
/* @var $this BlogGuaranteeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bitácora de Garantía',
	$order =  $model->Folio,
);

$this->menu=array(
//	array('label'=>'Create BlogGuarantee', 'url'=>array('create')),
	array('label'=>'Administrar Bitácoras de Garantías', 'url'=>array('admin')),
);
?>

<h1>Bitácoras de Garantías: Orden <?php echo $order ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
