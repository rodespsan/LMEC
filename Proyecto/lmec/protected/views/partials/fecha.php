<?php
$model->$name = ($model->$name!='0000-00-00 00:00:00')? date('Y-m-d',strtotime($model->$name)) : date('Y-m-d');
 
$this->widget('zii.widgets.jui.CJuiDatePicker',
	array('model'=>$model,
		'attribute'=>$name,
		'value'=>$model->$name,
		'language' => 'es',
		'htmlOptions' => array(
			'readonly'=>"readonly"
		),
		'options'=>array(
			'autoSize'=>false,
			'defaultDate'=>$model->$name,
			'dateFormat'=>'yy-mm-dd',
			'buttonImage'=>Yii::app()->baseUrl.'http://es.blackberry.com/content/dam/blackBerry/images/icon/switchable-icon-calendar.png.original.png',
			'buttonImageOnly'=>true,
			'buttonText'=>'Fecha',
			'selectOtherMonths'=>false,
			'showAnim'=>'slide',
			'showButtonPanel'=>false,
			//'showOn'=>'button',
			'showOtherMonths'=>false,
			//'changeMonth' => 'true',
			//'changeYear' => 'true',
			'minDate'=>'date("Y-m-d")', //fecha minima
			'maxDate'=>"+20Y", //fecha maxima
		),
	));
?>