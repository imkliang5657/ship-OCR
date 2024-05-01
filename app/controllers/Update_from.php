<?php

class Update_from extends Controller
{
    private $update_fromModel;
    private $updates;

    public function __construct() {
        $this->update_fromModel = $this->model('Update_fromModel');
    }

    /**
     * @return void
     */
    public function from() {
       $table="";
        $this->view('update_from/from', $table);
    }

    /**
     * @param $id
     * @return void
     */
    public function insert($parms) {
       // $this->updates=$this->update_fromModel->getShipByname($parms["name"]);
       $this->updates=$this->update_fromModel->insertShip_info($parms["name"],$parms["name"],$parms["name"],$parms["name"])
       // var_dump($this->updates);
        
    //    $this->updates = $this->update_fromModel->getconutry();
       // $data = "";//$this->updates;
        /*[
            'id' =>  $this->uploads['id'],
            'name' =>  $this->uploads['name'],
        ];*/
       // $this->view('upload/from', $data);
    }

}
