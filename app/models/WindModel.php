<?php

class WindModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getWindFarmByid($id)
    {
        $query = "SELECT * FROM `wind_farm_table` WHERE `id` =$id";
        $this->db->query($query);
        // $this->db->bind('account', $id);
        return $this->db->getSingle();
    }
}
