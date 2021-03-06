<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/filterFocus.js", CClientScript::POS_END);
/* @var $this RepairWorkController */
/* @var $model RepairWork */

$this->breadcrumbs=array(
	'Repair Works'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RepairWork', 'url'=>array('index')),
	array('label'=>'Create RepairWork', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#repair-work-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Repair Works</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'repair-work-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'afterAjaxUpdate'=>'afterAjaxUpdate',
	'columns'=>array(
		'id',
		'work_id',
		'user_id',
		'repair_id',
		'date_hour',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
