<?php
function getCsvData($fileName, $withHeader = true) {


    if (file_exists($fileName)) {
        $csvFile = fopen('car-db.csv', 'r');
        $header = fgetcsv($csvFile);
        
        if ($withHeader){
            $lines=$header;
        }
        else{
            $lines= [];
        }
        
        while (! feof($csvFile)){
            $line = fgetcsv($csvFile);
            $lines[] = $line;
        }
        fclose($csvFile);
    }
    else {
        echo "A fálj nem található";
    }
return $lines;}
?>