<?php

class DB{

protected $mysqli;

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
}
?>