<?php

$jsonArray = array();
$jsonArray['advance_payment'] = $advance_payment->advance_payment;

echo CJSON::encode($jsonArray);
