<?php
require_once('csv-tools.php');
require_once('db.tools.php');
ini_set('memory_limit','1024M');
$fileName = 'car-db.csv';
$csvData = getCsvData($fileName);

if(empty($csvData)){
    echo "Nem található adat a csv fájlban.";
    return false;
}

$mysqli = new mysqli("localhost","root",null,"cars");
    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
echo "connected <br>";

$makers=getmakers($csvData);

$result=insertMakers($mysqli,$makers, true);

$makers=getAllMakers($mysqli);
$cnt= count($makers);
echo "$cnt sor van;\n";

$mysqli -> close();

?>      