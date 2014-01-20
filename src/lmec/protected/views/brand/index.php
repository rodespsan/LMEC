<?php
/* @var $this BrandController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Marcas',
);

$this->menu=array(
	array('label'=>'Crear marca', 'url'=>array('create')),
	array('label'=>'Administrar marcas', 'url'=>array('admin')),
);
?>

<h1>Marcas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enableSorting' => true,
	'sortableAttributes'=>array(
            'name',
            
        ),
)); ?>
