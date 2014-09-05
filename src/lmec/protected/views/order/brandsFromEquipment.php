<?php
$brandsArray = array();
$modelsArray = array();

foreach ($brands as $brand) {

    $brandsArray[] = array(
        'id' => $brand->brand_id,
        'name' => $brand->Brand->name,
    );
}


foreach ($models as $model) {

    $modelsArray[] = array(
        'id' => $model->id,
        'name' => $model->name,
    );
}


$jsonArray = array();

$jsonArray['brands_options'] = $brandsArray;
$jsonArray['models_type'] = $modelsArray;


echo CJSON::encode($jsonArray);
?>