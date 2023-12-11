<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>

    <script src="js/jquery-3.7.1.js" type="text/javascript"></script>
    <script src="js/cars.js" type="text/javascript"></script>

    <link href="fontawesom/css/all.css" rel="stylesheet" type="text/css">
    <link href="css/cars.css" rel="stylesheet" type="text/css">

</head>
<body>
    <nav>
        <a href="makers.php"><button>Gyártók</button></a>
        <a href="models.php"><button>Modellek</button></a>
    </nav>
</html>
<?php
require_once('csv-tools.php');
require_once('db-tools.php');
require_once('DBMaker.php');
require_once('DB.php');
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
$makerDbTool=new DB();
echo "connected <br>";

$makers=getmakers($csvData);

$result=$makerDbTool->insertMakers($makers, true);

$allMakers=$makerDbTool->getAllMakers();
$cnt= count($allMakers);
echo "$cnt sor van;\n"; 


?>      
</body>
</html>