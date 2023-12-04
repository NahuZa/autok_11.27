<?php
class MakersDbTools{
    const DBTABLE = 'makers';

    private $mysqli;

    function --construct($host = 'localhost', $user='root', $password='null', $db = 'cars')
    {
        $this->mysqli = new ,mysqli($host,$user,$password,$db);
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
        $mysqli->query("TRUNCATE TABLE makers;");
        }
    
        foreach ($makers as $maker){
           $result= $this->$mysqli -> query("INSERT INTO makers (name) VALUES ('$maker');");
           if(!$result){
            "echo hiba történt a $maker beszúrása közben";
            return $result;
           }
           echo "$maker\n";
            
        }
        return $result;
    }


?>