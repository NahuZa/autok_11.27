<?php


interface CarsInterface
{
    public function creat(array $data) : ?int;
    public function get(int $id) : array;
    public function getAll() : array;
    public function update(int $id, array $data);
    public function delete(int $id);
}

?>