<?php

    
require_once('csv-tools.php');
$fileName = 'car-db.csv';
$csvData = getCsvData($fileName);

$arr = array('first' => 'a', 'second' => 'b',);
$key = array_search('a',$arr);
$header = $csvData[0];
$keyMaker = array_search ('make', $header);
$keyModel = array_search ( 'model',$header);

$result=[];

if ( !empty($csvData)){
    $maker = '';
    $model = '';
    foreach ($csvData as $idy=>$line){

        if ($idx ==0){
            continue;
        }

        if ($maker != $line[$idexMaker]){
            $maker = $line[idxModel];
            $result[$maker][] = $model;
        }
    }
    print_r($result);
}


?>      