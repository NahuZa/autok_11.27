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

$mysqli = new mysqli("localhost","root",null,"cars");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

echo "connected <br>";

$mysqli->query("TRUNCATE TABLE makers;");

foreach ($makers as $maker){
    $mysqli -> query("INSERT INTO makers (name) VALUES ('$maker');");
    echo "$maker   <br>";
}

$result = $mysqli->query("SELECT COUNT('id') as cnt FROM makers;");
$row = $result->fetch_assoc();
echo "{$row['cnt']} sor van;\n";

/*for ($x = 0; $x <= count($makers)-1; $x+=1){
 $mysqli -> query("INSERT INTO makers (name) VALUES ('$makers[$x]');");
    

}*/
  $mysqli -> close();

?>      