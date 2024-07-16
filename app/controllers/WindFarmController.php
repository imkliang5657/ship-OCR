<?php

class WindFarmController extends Controller
{
    protected WindFarm $windFarm;
    protected WindFarmInformation $windFarmInformation;

    public function __construct()
    {
        $this->windFarm = $this->model('windFarm');
        $this->windFarmInformation = $this->model('WindFarmInformation');
    }

    public function windFarm(): void
    {
        $this->view('wind-farm', ['windFarms' => $this->model('windFarm')->getAll()]);
    }

    public function windFarmNewForm(): void
    {
        $getData = $this->retrieveGetData();
        if (isset($getData['id'])) {
            $windFarm = $this->model('windFarm')->getByid($getData['id']);
            $this->view('wind-farm-new-form', [
                'windFarm' => $windFarm,
                'id' => $getData['id'],
                'vesselCategories' => $this->model('vesselCategory')->getAll(),
            ]);
        } else {
            $this->redirect('./?url=page/wind-farm');
        }
    }

    public function windFarmInformation(): void
    {
        $getData = $this->retrieveGetData();
        if (isset($getData['id'])) {
            $windFarm = $this->model('windFarm')->getByid($getData['id']);
            $this->view('wind-farm-information', [
                'windFarm' => $windFarm,
                'windFarmInformation' => $this->model('WindFarmInformation')->getByWindFarmId($windFarm['id']),
                'vesselCategories' => $this->model('vesselCategory')->getAll(),
                'id' => $getData['id']
            ]);
        } else {
            $this->redirect('./?url=page/wind-farm');
        }
    }

    public function upsertInformation(): void
    {
        $postData = $this->retrievePostData();
        if ($postData['id'] != NULl) {
            $information = $this->windFarm->getById($postData['id']);
            if ($information) {
                $this->windFarmInformation->update($postData);
            }
        } else {
            $this->windFarmInformation->create($postData);
        }
        $this->redirect('./?url=page/wind-farm-information&id=' . $postData['wind_farm_id']);
    }
}