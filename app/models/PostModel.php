<?php
include_once('../libraries/Database.php');
class PostModel {

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
    public function getPostById($id) {
        $query = 'SELECT * FROM `posts` WHERE `id` = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getSingle();
    }
    public function getshipId($id) {
        $query = 'SELECT * FROM `Company` WHERE `id` = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->getSingle();
    }
    public function insertShip_info(){
        $query = 'INSERT into `Vessel_Information` (name,IMO) ';
    }

}

$user=new PostModel;
echo "girh\n";
var_dump( $user->getshipId(1));
