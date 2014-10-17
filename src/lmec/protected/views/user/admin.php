<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar usuarios', 'url'=>array('index')),
	array('label'=>'Crear usuario', 'url'=>array('create')),
);

?>

<h1>Administrar usuarios</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de b&uacute;squeda, para especificar como se debe realizar la comparaci&oacute;n.
</p>

<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);

	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'user',
			'value'=>'CHtml::link($data->user,array("view","id"=>$data->id))',
			'type'=>'html',
		),
		'name',
		'last_name',
		'email',
		array(
			'name'=>'_roles',
			//'value'=>'CHtml::link($data->name,array("view","id"=>User::getRolesOfUser($data->id)))',
			'value'=>'User::getRolesOfUser($data->id)',
			'type'=>'html',
		),
		array(
			'name'=>'active',
			'value'=>'User::getActive($data->active)',
			'filter'=>array('0'=>'No','1'=>'Si'),
		),
		array(
			'class'=>'CButtonColumn',

			'header'=>CHtml::dropDownList(
				'pageSize',
				$pageSize,
				array(10=>10,20=>20,30=>30,40=>40,50=>50),
				array(
					'prompt'=>'Paginación',
					'onchange'=>"$.fn.yiiGridView.update('user-grid',{ data:{ pageSize: $(this).val() }})",
					)
				),
				
			'template'=>'{update}{view}{delete}{activate}',
			'deleteConfirmation'=>'¿Desactivar usuario?',
			'buttons' => array(

				'activate'=>array(
					'label'=>'Activar',
                    'url'=>'Yii::app()->createUrl("user/activate", array("id"=>$data->id))',
                    'imageUrl'=>'../images/active.png',
					'visible'=>'$data->active == 0',
					'click'=>'function()
							{
								if(!confirm(\'¿Activar usuario?\')){
										return false;
								}
								$.fn.yiiGridView.update(\'user-grid\',{
									type:\'POST\',
									url:$(this).attr(\'href\'),
									success:function(data){
									$.fn.yiiGridView.update(\'user-grid\');
									},
								});
								return false;
							}',
				),
				 'delete' => array(
                    'visible' => '$data->active == 1',
                    'label' => 'Desactivar',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/deactive.png',
                ),
			),
		),
	),
)); ?>

<?php Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
	$('.change-pageSize').live('change',function(){
		$.fn.yiiGridView.update('user-grid',{ data:{ pageSize: $(this).val() }} ) 
		});
EOD
	,CClientScript::POS_READY);?>