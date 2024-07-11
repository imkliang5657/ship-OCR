<?php

class Application
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllByApplicantId($applicant_id): array|bool
    {
        $query = 'SELECT * FROM `applications` WHERE `applicant_id`=:applicant_id';
        $this->db->query($query);
        $this->db->bind(':applicant_id', $applicant_id);
        return $this->db->getAll();
    }

    public function getById($id): mixed
    {
        $query = 'SELECT * FROM `applications` WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getSingle();
    }

    public function create(array $data ,int $applicant_id): int
    {
        //$_SESSION['id'] = 1;
        $query = <<<SQL
            INSERT INTO `applications`(`applicant_id`) VALUES ({$applicant_id})
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

    public function getFullDataById(int $id): array|bool
    {
        $vdColumnStr = implode(', ', array_map(fn($column) => "vd.$column", VesselDetail::columns()));
        $query = <<<SQL
            SELECT 
                a.id, a.status, 
                u.name AS applicant_name,
                ai.work_item,
                ai.description,
                ai.required_sailing_date,
                ai.required_return_date,
                wf.name AS wind_farm_name,
                vc.id AS vessel_category_id,
                vc.vessel_category_name AS vessel_category_name,
                $vdColumnStr,
                v.name AS vessel_name
            FROM 
                applications a
            JOIN
                users u ON u.id = a.applicant_id
            JOIN
                application_informations ai ON a.id = ai.application_id
            JOIN
                wind_farms wf ON wf.id = ai.wind_farm_id
            JOIN
                vessel_categories vc ON vc.id = ai.vessel_category_id
            JOIN 
                application_vessel_requirements avr ON a.id = avr.application_id
            JOIN 
                vessel_details vd ON vd.id = avr.vessel_detail_id
            JOIN 
                application_foreign_vessel afv ON a.id = afv.application_id
            JOIN 
                vessels v ON v.id = afv.foreign_vessel_id
            WHERE 
                a.id = :id
        SQL;
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getSingle();
    }

    public function updateStatus(int $id, string $status):void
    {
        $query = 'UPDATE `applications` SET `status`=:status WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        $this->db->execute();
    }
}

