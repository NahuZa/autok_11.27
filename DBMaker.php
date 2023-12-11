<?php

require_once 'CarsInterface.php';
require_once 'Db.php';

class DBMaker extends DB implements CarsInterface
{
    const DBTABLE = 'makers';  

    public function creat(array $data) : ?int
    {
        $sql = "INSERT INTO makers $data";
        $this->mysqli-query($sql);

        $lastInserted = $this   
            ->mysqli
            ->query("SELECT LAST_INSERT_ID() id;")
            ->fetch_assoc();

            return $lastInserted['id'];
    }


    public function insertMakers($makers, $truncate = false){
    
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

    public function update(int $id, array $data)
    {
        $query = "UPDATE makers SET $data WHERE id = $id";
        $this->mysqli->query($query);
        return $this->get($id);
    }
    
    public function get(int $id) : array
    {
        $query = "SELECT * FROM makers WHERE id=$id";
        return $this->mysqli->query($query)->fetch_assoc();
    
        return $maker;
    }
    
    public function getMakerByName($mysqli, $name){ 
        $result = $mysqli -> query("SELECT * FROM makers WHERE name=$name");
        $maker = $result ->fetch_assoc();
        $result=free_result;
    
        return $maker;
    }
    
    public function delete(int $id){
        $query=("DELETE FROM makers WHERE id=$id");
        
        return $this->mysqli->query($query);
    }
    
    public function getAll() : array
    {
        $query= ("SELECT * FROM makers ORDER BY name");
        return $this->mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
    
       
    }

    public function getAbc():array
    {
        $query=("SELECT DISTINCT SUBSTRING(name,1,1) as ch FROM makers ORDER BY ch;");

        return $this->mysqli->query($query)->fetch_all(MYSQLI_ASSOC);

    }

    public function getByFirstCh($ch)
    {
        $query = "SELECT * FROM makers WHERE name Like '$ch%' ORDER BY name";

        return $this->mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}

?>