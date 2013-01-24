<?php
$this->breadcrumbs=array(
	'Accesorios'=>array('index'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Accesorios', 'url'=>array('index')),
	array('label'=>'Registrar accesorio', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('accesory-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador de accesorios</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accesory-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'active',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
