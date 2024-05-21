<?php

class WindFarmCategory
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll(): array|bool
    {
        $query = 'SELECT * FROM `wind_farm_categories`';
        $this->db->query($query);
        return $this->db->getAll();
    }
}
