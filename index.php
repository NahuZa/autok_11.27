<?php
require_once('csv-tools.php');
ini_set('memory_limit','1024M');
$fileName = 'car-db.csv';
$csvData = getCsvData($fileName);

if(empty($csvData)){
    echo "Nem található adat a csv fájlban.";
    return false;
}


$header = $csvData[0];

$keyMaker = array_search('make', $header);
$keyModel = array_search('model',$header);

$result=[];


$maker = '';
$model = '';
$isHeader=true;
foreach ($csvData as $data){

    if(!is_array($data)){
        continue;
    }

    if($isHeader){
        $isHeader=false;
        continue;   
    }

    if ($maker != $data[$keyMaker]){
        $maker=$data[$keyMaker];
        print("$maker ");
    }
        
    if($model!= $data[$keyModel]){
        $model=$data[$keyModel];
        $result[$maker][]=$model;
    }
}

//print_r($result);




?>      