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
?>