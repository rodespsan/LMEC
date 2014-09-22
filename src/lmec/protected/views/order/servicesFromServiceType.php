<?php

$servicesArray = array();



foreach($services as $service){

	$servicesArray[] = array(
		'id' => $service->id,
		'name' => $service->name,
                
	);
}




$jsonArray = array();

$jsonArray[ 'services_options' ] = $servicesArray;

echo CJSON::encode($jsonArray);
?>