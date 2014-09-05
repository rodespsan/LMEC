
<?php
/* @var $this DiagnosticController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Diagnósticos',
);

$this->menu=array(
	array('label'=>'Administrar Diagnósticos', 'url'=>array('admin')),
);
?>

<h1>Diagnósticos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
