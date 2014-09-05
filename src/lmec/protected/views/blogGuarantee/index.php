<?php
/* @var $this BlogGuaranteeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bitácora de Garantía',
);

$this->menu=array(
//	array('label'=>'Create BlogGuarantee', 'url'=>array('create')),
	array('label'=>'Administrar Bitágoras de Garantías', 'url'=>array('admin')),
);
?>

<h1>Bitácoras de Garantías</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
