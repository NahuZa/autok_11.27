<?php
require_once('csv-tools.php');
ini_set('memory_limit','1024M');
$fileName = 'car-db.csv';
$csvData = getCsvData($fileName);

if(empty($csvData)){
    echo "Nem található adat a csv fájlban.";
    return false;
}

$makers=getmakers($csvData);
print_r($makers);


?>      