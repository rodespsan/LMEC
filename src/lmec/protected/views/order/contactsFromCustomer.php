<?php
$contactsArray = array();
foreach($contacts as $contact){
	$contactsArray[] = array(
		'id' => $contact->id,
		'name' => $contact->name
	);
}

$jsonArray = array();
$jsonArray[ 'customer_type' ] = $customer->customer_type_id;
$jsonArray[ 'contact_options' ] = $contactsArray;
$jsonArray['advance_payment'] = $advance_payment->advance_payment;

echo CJSON::encode($jsonArray);
?>