<?php

class Application
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll(): array|bool
    {
        $query = 'SELECT * FROM `applications`';
        $this->db->query($query);
        return $this->db->getAll();
    }

    public function getById($id): mixed
    {
        $query = 'SELECT * FROM `applications` WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getSingle();
    }

    public function create(array $data): int
    {
        $_SESSION['id'] = 1;
        $query = <<<SQL
            INSERT INTO `applications`(`applicant_id`) VALUES ({$_SESSION['id']})
        SQL;
        $this->db->query($query);
        $this->db->execute();

        $query = <<<SQL
            SELECT LAST_INSERT_ID() as `id`
        SQL;
        $this->db->query($query);
        $this->db->execute();
        $application = $this->db->getSingle();

        $query = <<<SQL
            INSERT INTO
                `application_informations`(`application_id`, `wind_farm_id`, `work_item`, `vessel_category_id`, `required_sailing_date`, `required_return_date`, `description`)
            VALUES
                (:application_id, :wind_farm_id, :work_item, :vessel_category_id, :required_sailing_date, :required_return_date, :description)
        SQL;
        $this->db->query($query);
        $this->db->bind(':application_id', $application['id']);
        $this->db->bind(':wind_farm_id', $data['wind_farm_id']);
        $this->db->bind(':work_item', $data['work_item']);
        $this->db->bind(':vessel_category_id', $data['vessel_category_id']);
        $this->db->bind(':required_sailing_date', $data['required_sailing_date']);
        $this->db->bind(':required_return_date', $data['required_return_date']);
        $this->db->bind(':description', $data['description']);
        $this->db->execute();

        return $application['id'];
    }

    public function update(array $data): void
    {
        $query = <<<SQL
            UPDATE
                `application_informations`
            SET
                `wind_farm_id`=:wind_farm_id,
                `work_item`=:work_item,
                `vessel_category_id`=:vessel_category_id,
                `required_sailing_date`=:required_sailing_date,
                `required_return_date`=:required_return_date,
                `description`=:description
            WHERE
                `application_id`=:application_id
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
    public function statuschange($status ,$id):void
    {
        $query = <<<SQL
        UPDATE
            `applications`
        SET
            `status`=:status
        WHERE
            `id`=:id
        SQL;
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        $this->db->execute();
    }
}

