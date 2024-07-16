<?php

class ApplicationInformation
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getByApplicationId(int $id): mixed
    {
        $query = 'SELECT * FROM `application_informations` WHERE `application_id`=:id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getSingle();
    }

    public function create(array $data): void
    {
        $query = <<<SQL
            INSERT INTO
                `application_informations`(`application_id`, `wind_farm_id`, `work_item`, `vessel_category_id`, `required_sailing_date`, `required_return_date`, `description`)
            VALUES
                (:application_id, :wind_farm_id, :work_item, :vessel_category_id, :required_sailing_date, :required_return_date, :description)
        SQL;
        $this->db->query($query);
        $this->db->bind(':application_id', $data['application_id']);
        $this->db->bind(':wind_farm_id', $data['wind_farm_id']);
        $this->db->bind(':work_item', $data['work_item']);
        $this->db->bind(':vessel_category_id', $data['vessel_category_id']);
        $this->db->bind(':required_sailing_date', $data['required_sailing_date']);
        $this->db->bind(':required_return_date', $data['required_return_date']);
        $this->db->bind(':description', $data['description']);
        $this->db->execute();
    }
}

