<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Roles', 'url'=>array('index')),
	array('label'=>'Registrar un rol', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('role-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador de roles</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'role-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'role',
		'active',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
