<?php

$modelsArray = array();



foreach($models as $model){

	$modelsArray[] = array(
		'id' => $model->id,
		'name' => $model->name,
                
	);
}




$jsonArray = array();

$jsonArray[ 'models_options' ] = $modelsArray;

echo CJSON::encode($jsonArray);
?>