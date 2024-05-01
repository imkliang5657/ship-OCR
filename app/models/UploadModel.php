<?php
include_once('../app/libraries/Database.php');
class UploadModel {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * @return array
     */
    public function getPosts() {}

    /**
     * @param $id
     * @return array
     */
    public function getShipByname($name) {
        $query = 'SELECT * FROM `Vessel_Information` WHERE `name` = $name ';
        $this->db->query($query);
       // $this->db->bind('id', $id);
        return $this->db->getSingle();
    }
    public function getconutry() {
        $query = 'SELECT * FROM `country` WHERE 1';
        $this->db->query($query);
       // $this->db->bind('id', $id);
        return $this->db->getAll();
    }
    public function insertShip_info(){
        $query = 'INSERT INTO `Vessel_Detail_Information`(`id`, `LOA`, `breadth`, `depth`, `draft_min`, `draft_max`) 
            VALUES (1,2,3) ';
    }

}

$user=new UploadModel;
var_dump( $user->getconutry());
