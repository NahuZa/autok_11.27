<?php
function insertMakers($mysql, $makers, $truncate = false){
    
    if($truncate){
    $mysqli->query("TRUNCATE TABLE makers;");
    }

    foreach ($makers as $maker){
       $result= $mysqli -> query("INSERT INTO makers (name) VALUES ('$maker');");
       if(!$result){
        "echo hiba történt a $maker beszúrása közben";
        return $result;
       }
        
    }
    return $result;
    
function updateMaker($mysqli, $data){
    $makerName=$data['name']
    $result = $mysql -> query("UPDATE makers SET name=$makerName");


    if(!$result){
        echo "hiba történt a $makerName beszúrása közben";
        return $result;
    }
    
    $maker = getMakerByName($mysqli, $makerName);

    return $makerName;
}

function getMaker($mysqli, $id){
    $result = $mysqli -> query("SELECT * FROM makers WHERE id=$id");
    $maker = $result->fetch_assoc();

    return $maker;
}

function getMakerByName($mysqli, $name){
    $result = $mysqli -> query("SELECT * FROM makers WHERE name=$name");
    $maker = $result ->fetch_assoc();

    return $maker;
}

function delMaker($mysqli, $id){
    $result=$mysqli->query("DELETE makers WHERE id=$id");
    
    return $result;
}

?>