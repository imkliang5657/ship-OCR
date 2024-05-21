<?php

class WindFarm
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getWindFarmById($id): mixed
    {
        $query = 'SELECT * FROM `wind_farms` WHERE `id` = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getSingle();
    }
}
