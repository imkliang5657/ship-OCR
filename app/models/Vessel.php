<?php

class Vessel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll(): array|bool
    {
        $query = 'SELECT * FROM `vessels`';
        $this->db->query($query);
        return $this->db->getAll();
    }

    public function getByVesselCategoryId(int $vesselCategoryId): array|bool
    {
        $query = 'SELECT * FROM `vessels` WHERE `vessel_category_id`=:vessel_category_id';
        $this->db->query($query);
        $this->db->bind(':vessel_category_id', $vesselCategoryId);
        return $this->db->getAll();
    }

    public function getById(int $id): mixed
    {
        $query = 'SELECT * FROM `vessels` WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getSingle();
    }
}
