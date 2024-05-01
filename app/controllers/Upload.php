<?php

class Upload extends Controller
{
    private $uploadModel;
    private $uploads;

    public function __construct() {
        $this->uploadModel = $this->model('UploadModel');
    }

    /**
     * @return void
     */
    public function index() {
        $posts="";
        $this->view('upload/index', $posts);
    }

    /**
     * @param $id
     * @return void
     */
    public function show() {
        $this->uploads = $this->uploadModel->getconutry();
        $data = $this->uploads;
        /*[
            'id' =>  $this->uploads['id'],
            'name' =>  $this->uploads['name'],
        ];*/
        $this->view('upload/upload', $data);
    }

}
