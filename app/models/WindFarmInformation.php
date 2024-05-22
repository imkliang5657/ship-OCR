<?php

class WindFarmInformation
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll(): array|bool
    {
        $query = 'SELECT * FROM `wind_farm_information`';
        $this->db->query($query);
        return $this->db->getAll();
    }

    public function create(array $data): void
    {
        $query = <<<SQL
            INSERT INTO
                `wind_farm_information` (`wind_farm_id`, `item`, `detail`, `start_shipment_time`, `end_shipment_time`, `vessel_category_id`)
            VALUES
                (:wind_farm_id, :item, :detail, :start_shipment_time, :end_shipment_time, :vessel_category_id)
        SQL;
        $this->db->bind(':wind_farm_id', $data['wind_farm_id']);
        $this->db->bind(':item', $data['item']);
        $this->db->bind(':detail', $data['detail']);
        $this->db->bind(':start_shipment_time', $data['start_shipment_time']);
        $this->db->bind(':end_shipment_time', $data['end_shipment_time']);
        $this->db->bind(':vessel_category_id', $data['vessel_category_id']);
        $this->db->query($query);
        $this->db->execute();
    }

    public function update(array $data): void
    {
        $query = <<<SQL
            UPDATE
                `wind_farm_information`
            SET
                `wind_farm_id`=:wind_farm_id,
                `item`=:item,
                `detail`=:detail,
                `start_shipment_time`=:start_shipment_time,
                `end_shipment_time`=:end_shipment_time,
                `vessel_category_id`=:vessel_category_id
            WHERE
                `id`=:id
        SQL;
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':wind_farm_id', $data['wind_farm_id']);
        $this->db->bind(':item', $data['item']);
        $this->db->bind(':detail', $data['detail']);
        $this->db->bind(':start_shipment_time', $data['start_shipment_time']);
        $this->db->bind(':end_shipment_time', $data['end_shipment_time']);
        $this->db->bind(':vessel_category_id', $data['vessel_category_id']);
        $this->db->query($query);
        $this->db->execute();
    }
}
