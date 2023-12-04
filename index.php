<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
</head>
<body>
<html><p>A kapcsolat állapota:</p></html>
<?php
require_once('csv-tools.php');
require_once('db-tools.php');
require_once('MakersDbTools.php');
ini_set('memory_limit','1024M');
$fileName = 'car-db.csv';
$csvData = getCsvData($fileName);   

if(empty($csvData)){
    echo "Nem található adat a csv fájlban.";
    return false;
}

/*$mysqli = new mysqli("localhost","root",null,"cars");
    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }*/
$makerDbTool=new MakersDbTools();
echo "connected <br>";
?>
<p>Az autók:</p>
<?php 
$makers=getmakers($csvData);

$result=$makerDbTool->insertMakers($makers, true);

$allMakers=$makerDbTool->getAllMakers();
$cnt= count($allMakers);
echo "$cnt sor van;\n"; 


?>      
</body>
</html>