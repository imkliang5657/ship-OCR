<?php

class User {
    private Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserByAccount($account): bool|array
    {
        $query = 'SELECT * FROM `Users` WHERE `account` = :account';
        $this->db->query($query);
        $this->db->bind('account', $account);
        return $this->db->getSingle();
    }

}
