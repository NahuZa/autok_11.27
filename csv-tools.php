<?php
function getCsvData($fileName, $withHeader = true) {
    if (!file_exists($fileName)) {
        echo "$filename nem található";
        return false;
    }
    $csvFile = fopen($fileName, 'r');
    $lines=[];
    while (! feof($csvFile)) {
        $line = fgetcsv($csvFile);
        $lines[] = $line;
    }
    fclose($csvFile);
        
    return $lines;
}

function getmakers($csvData){
    $header = $csvData[0];
    $keyMaker = array_search('make', $header);
    //$keyModel = array_search('model',$header);
    //$result=[];
    $maker = '';
    $makers=[]; 
    //$model = '';
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
            $makers[]=$maker;
        }
        /*if($model!= $data[$keyModel]){
            $model=$data[$keyModel];
            $result[$maker][]=$model;
        }*/
    }     
    return $makers;
}
    

?>