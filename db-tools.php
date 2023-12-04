<?php

    
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
    $result=free_result;

    return $maker;
}

function delMaker($mysqli, $id){
    $result=$mysqli->query("DELETE makers WHERE id=$id");
    
    return $result;
}

function getAllMakers($mysqli){
    $result=$mysqli->query("SELECT * FROM makers");
    $makers=$result->fetch_all(MYSQLI_ASSOC);
    $result=free_result;

    return $makets;
}

?>