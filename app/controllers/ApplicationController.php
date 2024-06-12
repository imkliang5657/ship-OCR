<?php

class ApplicationController extends Controller
{
    public function createApplication(): void
    {
        $this->view('create-application',['windFarms' => $this->model('WindFarm')->getAll(),'vessel_categories' =>$this->model('VesselCategory')->getAll()]);
    }
    public function requirementSpec(): void
    {
        $getData=$this->retrieveGetData();
        $VesselCategory=$this->model('VesselCategory')->getById($getData['id']);
        $col=$this->model('VesselCategorySpec')->getAllColunms($VesselCategory['table_name']);
        array_shift($col);//去除id
        $this->view('application-requirement-spec',['columns'=> $col]);
    }
    public function applicationShip(): void
    {
        $this->view('application-ship');
    }
    public function createApplicationCase()
    {
        $postData=$this->retrievePostData();
        $this->redirect('./?url=page/application-requirement-spec&id=' . $postData['vessel_categories_id']);
    }
}