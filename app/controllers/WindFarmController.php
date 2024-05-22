<?php

class WindFarmController extends Controller
{
    protected WindFarm $windFarm;
    protected WindFarmInformation $windFarmInformation;

    public function __construct()
    {
        $this->windFarm = $this->model('WindFarm');
        $this->windFarmInformation = $this->model('WindFarmInformation');
    }

    public function createInformation(): void
    {
        $postData = $this->retrievePostData();
        $this->windFarmInformation->create($postData);
    }

    public function updateInformation(): void
    {
        $postData = $this->retrievePostData();
        $information = $this->windFarm->getById($postData['id']);
        if (isset($information)) {
            $this->windFarmInformation->update($postData);
        }
    }
}