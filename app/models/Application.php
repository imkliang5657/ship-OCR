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
        $query = 'SELECT * FROM `application_documents`';
        $this->db->query($query);
        return $this->db->getAll();
    }

    public function getById($id): mixed
    {
        $query = 'SELECT * FROM `application_documents` WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getSingle();
    }
    public function create(array $data): void
    {
        $query = <<<SQL
            INSERT INTO
                `review_events` (`vessel_info_id`, `company_id`, `work_item`, `start_shipment_time`, `end_shipment_time`, `vessel_category_id`, `number`, `is_signed`)
            VALUES
                (:wind_farm_id, :item, :detail, :start_shipment_time, :end_shipment_time, :vessel_category_id, :number, :is_signed)
        SQL;
        $this->db->query($query);
        $this->db->bind(':wind_farm_id', $data['wind_farm_id']);
        $this->db->bind(':item', $data['item']);
        $this->db->bind(':detail', $data['detail']);
        $this->db->bind(':start_shipment_time', $data['start_shipment_time']);
        $this->db->bind(':end_shipment_time', $data['end_shipment_time']);
        $this->db->bind(':vessel_category_id', $data['vessel_category_id']);
        $this->db->bind(':number', $data['number']);
        $this->db->bind(':is_signed', $data['is_signed'] == '1');
        $this->db->execute();
    }

}
