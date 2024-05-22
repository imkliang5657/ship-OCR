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

    public function upsertInformation(): void
    {
        $postData = $this->retrievePostData();
        if (empty($postData['id'])) {
            $this->windFarmInformation->create($postData);
        } else {
            var_dump('update');
            $information = $this->windFarm->getById($postData['id']);
            if (isset($information)) {
                $this->windFarmInformation->update($postData);
            }
        }
        $this->redirect('./?url=page/wind-farm-information&id=' . $postData['wind_farm_id']);
    }
}