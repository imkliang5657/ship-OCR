<?php

class VesselDetail
{
    private Database $db;

    const MAX_SPEC_COUNT = 7;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll(): array|bool
    {
        $query = 'SELECT * FROM `vessel_details`';
        $this->db->query($query);
        return $this->db->getAll();
    }

    public function getById(int $id): mixed
    {
        $query = 'SELECT * FROM `vessel_details` WHERE `id`=:id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getSingle();
    }

    public function create(array $data): void
    {
        $columns = array_map(fn($i) => "specification_$i", range(1, self::MAX_SPEC_COUNT));
        $placeholders = array_map(fn($column) => ':' . $column, $columns);
        $values = array_values(array_intersect_key($data, array_flip($columns)));
        $columnsStr = implode(', ', $columns);
        $placeholdersStr = implode(', ', $placeholders);
        $query = <<<SQL
            INSERT INTO `vessel_details`($columnsStr)
            VALUES ($placeholdersStr)
        SQL;
        $this->db->query($query);
        for ($i = 0; $i < self::MAX_SPEC_COUNT; $i++) {
            $this->db->bind($placeholders[$i], $values[$i]);
        }
        $this->db->execute();
    }

    public function lastInsertId(): int
    {
        $query = 'SELECT LAST_INSERT_ID() as id';
        $this->db->query($query);
        $this->db->execute();
        return $this->db->getSingle()['id'];
    }
}
