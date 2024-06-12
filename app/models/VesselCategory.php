<?php

class VesselCategory
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll(): array|bool
    {
        $query = 'SELECT * FROM `vessel_categories`';
        $this->db->query($query);
        return $this->db->getAll();
    }
    public function getById($id): mixed
    {
        $query = 'SELECT * FROM `vessel_categories` WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getSingle();
    }
}
