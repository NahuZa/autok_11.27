<?php
class MakersDbTools{
    const DBTABLE = 'makers';

    private $mysqli;

    function __construct($host='localhost', $user='root', $password='', $db ='cars')
    {
        $this->mysqli = new mysqli($host,$user,$password,$db);
        if ($this->mysqli->connect_errno) 
        {
            throw new Exception($this->mysqli->connect_errno);
        }
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    function insertMakers($makers, $truncate = false){
    
        if($truncate){
        $this->mysqli->query("TRUNCATE TABLE makers;");
        }
    
        foreach ($makers as $maker){
           $result= $this->mysqli -> query("INSERT INTO makers (name) VALUES ('$maker');");
           if(!$result){
            "echo hiba történt a $maker beszúrása közben";
            return $result;
           }
           echo "$maker\n";
            
        }
        return $result;
    }

    function updateMaker($mysqli, $data){
        $makerName=$data['name'];
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
    
    function getAllMakers(){
        $result=$this->mysqli->query("SELECT * FROM makers");
        $makers=$result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
    
        return $makers;
    }
}

?>